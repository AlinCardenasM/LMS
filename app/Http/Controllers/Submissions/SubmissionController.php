<?php

namespace App\Http\Controllers\Submissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\StoreSubmissionRequest;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use Illuminate\Http\Request;

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
