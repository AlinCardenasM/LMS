<?php

namespace App\Http\Controllers\Assignments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assignment\StoreAssignmentRequest;
use App\Http\Requests\Assignment\UpdateAssignmentRequest;
use App\Models\Assignment;
use App\Models\Content;
use App\Models\Course;
use App\Models\Submission;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $module = $course->modules()->pluck('id', 'title');
        $assignment = new Assignment();
        return view('lms.assigment.create', compact('module', 'assignment', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignmentRequest $request, Course $course)
    {
        // Validar datos
        $data = $request->validated();

        // Crear el contenido primero
        $assignment = Assignment::create($data);

        // Verificar si hay archivos
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $path = $file->store('assignment', 'public');

                $assignment->files()->create([
                    'original_name' => $file->getClientOriginalName(),
                    'stored_name'   => basename($path),
                    'path'          => $path,
                    'mime_type'     => $file->getMimeType(),
                    'size'          => $file->getSize(),
                    'order'         => $index,
                ]);
            }
        }
        /* Retorna a vista inicial */
        return to_route('courses.modules.index', $course);
    }

    public function review(Course $course, Assignment $assignment)
    {
        // Estudiantes inscritos en el curso
        $students = $course->users()->where('role', 'alumno')->get();

        // Submissions con usuario y calificación
        $submitted = $assignment->submissions()
            ->with(['user'])
            ->get();

         // Entrega seleccionada (la primera por defecto)
        $selectedSubmission = $submitted->first();

        // IDs de quienes ya entregaron
        $submittedUserIds = $submitted->pluck('user_id');

        // Alumnos que NO han entregado
        $assigned = $students->filter(function ($student) use ($submittedUserIds) {
            return ! $submittedUserIds->contains($student->id);
        });

        return view('lms.submissions.review', compact(
            'course',
            'assignment',
            'submitted',
            'assigned',
            'selectedSubmission'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Assignment $assignment)
    {
        $submission = Submission::where('assignment_id', $assignment->id)
                    ->where('user_id', auth()->id())
                    ->with('files')
                    ->first();
        return view('lms.assigment.show', compact('assignment', 'course', 'submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course,Assignment $assignment)
    {
        $module = $course->modules()->pluck('id', 'title');
        return view('lms.assigment.edit', compact('course', 'assignment', 'module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignmentRequest $request,Course $course, Assignment $assignment)
    {
        $data=$request->validated();
        $assignment->update($data);
        // Verificar si hay archivos
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $path = $file->store('assignment', 'public');

                $assignment->files()->create([
                    'original_name' => $file->getClientOriginalName(),
                    'stored_name'   => basename($path),
                    'path'          => $path,
                    'mime_type'     => $file->getMimeType(),
                    'size'          => $file->getSize(),
                    'order'         => $index,
                ]);
            }
        }

        return to_route('courses.modules.index', compact('course'))->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Assignment $assignment)
    {
        $delete = $assignment -> delete();
        return to_route('courses.modules.index', compact('course'))->with('success', 'Tarea eliminado correctamente.');;
    }
}
