<?php

namespace App\Http\Controllers\Submissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\StoreSubmissionRequest;
use App\Http\Requests\Submission\UpdateSubmissionRequest;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
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
    public function create(Course $course, Assignment $assignment)
    {
        $submission = new Submission();
        return view('lms.submissions.create', compact('assignment', 'submission', 'course')); 
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreSubmissionRequest $request, Course $course, Assignment $assignment)
    {
         // Validar datos
        $data = $request->validated();
        $data['assignment_id'] = $assignment->id;
        $data['user_id'] = auth()->id();

        // Crear el contenido primero
        $submission = Submission::create($data);

        // Verificar si hay archivos
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $path = $file->store('submission', 'public');

                $submission->files()->create([
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
        return to_route('courses.assignments.show', compact('course', 'assignment'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course,  Assignment $assignment,Submission $submission)
    {
        $submission->load([
            'user',
            'files',
            'grade'
        ]);

        // Estudiantes inscritos en el curso
        $students = $course->users()->where('role', 'alumno')->get();

        // Submissions con usuario y calificación
        $submitted = $assignment->submissions()
            ->with(['user'])
            ->get();

         // Entrega seleccionada (la primera por defecto)
        $selectedSubmission = $submission;

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
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course,  Assignment $assignment,Submission $submission)
    {
        return view('lms.submissions.edit', compact('submission', 'course', 'assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubmissionRequest $request, Course $course,  Assignment $assignment,Submission $submission)
    {
        if($request->filled('delete_files')){

            $files = $submission->files()
                ->whereIn('id', $request->delete_files)
                ->get();

            foreach($files as $file){

                Storage::disk('public')
                    ->delete($file->path);

                $file->delete();
            }
        }

         // Validar datos
        $data = $request->validated();
        $data['assignment_id'] = $assignment->id;
        $data['user_id'] = auth()->id();

        // Crear el contenido primero
        $submission->update($data);

        // Verificar si hay archivos
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $path = $file->store('submission', 'public');

                $submission->files()->create([
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
        return to_route('courses.assignments.show', compact('course', 'assignment'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
