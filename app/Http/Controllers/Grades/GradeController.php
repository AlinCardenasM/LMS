<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grade\StoreGradeRequest;
use App\Http\Requests\Grade\UpdateGradeRequest;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Submission;
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
    public function create(Course $course, Assignment $assignment, Submission $submission) 
    {
        return view('lms.grade.create', compact(
            'course',
            'assignment',
            'submission'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request, Course $course, Assignment $assignment, Submission $submission)
    {
        $data = $request->validated();
        $data['submission_id'] = $submission->id;
        $grade = Grade::create($data);
        return to_route('courses.assignments.submissions.show', compact('course', 'assignment', 'submission'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Assignment $assignment, Submission $submission)
    {
        $submission->load('grade');
        return view('lms.grade.edit', compact(
            'course',
            'assignment',
            'submission'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, Course $course, Assignment $assignment, Submission $submission)
    {
        $data = $request->validated();
        $grade = $submission->grade;
        $grade->update($data);
        return to_route('courses.assignments.submissions.show', compact('course', 'assignment', 'submission'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
