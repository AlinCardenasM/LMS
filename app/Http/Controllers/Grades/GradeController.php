<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $students = $course->users()
        ->where('role', 'alumno')
        ->get();

        $assignments = Assignment::whereHas('module', function ($query) use ($course) {
            $query->where('course_id', $course->id);
        })
        ->with('submissions.grade')
        ->paginate(6);

        return view('lms.grade.index', compact(
            'course',
            'students',
            'assignments'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Assignment $assignment)
    {
        /* $students = $course->users()
        ->where('role', 'alumno')
        ->get();

        $submissions = $assignment->submissions()
            ->with(['user', 'grade'])
            ->get();

        $submitted = $submissions;

        $assigned = $students->filter(function ($student) use ($submissions) {
            return !$submissions->contains('user_id', $student->id);
        });

        return view(
            'lms.grades.show',
            compact(
                'course',
                'assignment',
                'submitted',
                'assigned'
            )
        ); */
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
