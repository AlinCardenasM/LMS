<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Course_status;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view('lms.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = Course_status::pluck('id', 'name');
        $course = new Course();
        return view('lms.course.create', compact('status', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        /* Aqui se obtienen los datos validados */
        $data = $request->validated();
        /* Manejo de imagen */
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/courses'), $filename);
            // guardar SOLO el nombre o la ruta
            $data['image'] = 'uploads/courses/' . $filename;
        } else {
            $files = glob(public_path('uploads/defaults/*'));
            if ($files) {
                $randomImage = $files[array_rand($files)];
                // guardar ruta relativa
                $data['image'] = 'uploads/defaults/' . basename($randomImage);
            } else {
                $data['image'] = null; 
            }
        }

        Course::create($data);
        return to_route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('lms.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $status = Course_status::pluck('id', 'name');
        return view('lms.course.edit', compact('status', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();
        /* Manejo de imagen */
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/courses'), $filename);
            // guardar SOLO el nombre o la ruta
            $data['image'] = 'uploads/courses/' . $filename;
        }

        $course->update($data);
        return to_route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $delete = $course -> delete();
        return to_route('course.index', $delete);
    }
}
