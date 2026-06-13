<?php

namespace App\Http\Controllers\UsersList;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
         $teacher = $course->user; // creador del curso

        $students = $course->users()
            ->where('role_id', 2) // ajusta según tu rol de alumno
            ->get();

        return view('lms.UserList.index', compact(
            'course',
            'teacher',
            'students'
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
    public function destroy(Course $course, User $user)
    {
        // Eliminar la inscripción del alumno en el curso
        $course->users()->detach($user->id);

        return redirect()
            ->route('courses.users.index', $course)
            ->with('success', 'Alumno eliminado del curso correctamente.');
    }
}
