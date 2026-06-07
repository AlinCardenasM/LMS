<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourseRequest;
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
        /* obtiene alusuario autenticado */
        $user = auth()->user();
        /* hace la validacion para filtrar */
        if ($user->role_id == 1 ) {
            $courses = Course::where('user_id', $user->id)->paginate(10);
        } else {
            $courses = $user->courses()->paginate(10);
        }
        return view('lms.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* Obtener informacion de atributo fonaneo solo id, nombre */
        $status = Course_status::pluck('id', 'name');
        /* Generar instancia de course */
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
        $data['user_id'] = auth()->id();
        /* Manejo de imagen */
        if ($request->hasFile('image')) {
            /* Crear nombre de imagen */
            $filename = time() . '.' . $request->image->extension();
            /* Obtener imagen y enviarla a carpeta uploads/courses */
            $request->image->move(public_path('uploads/courses'), $filename);
            // guardar SOLO el nombre o la ruta
            $data['image'] = 'uploads/courses/' . $filename;
        } else {
            /* Obtener imagen al azar que ya se encuentra guardada */
            $files = glob(public_path('uploads/defaults/*'));
            if ($files) {
                $randomImage = $files[array_rand($files)];
                // guardar ruta relativa
                $data['image'] = 'uploads/defaults/' . basename($randomImage);
            } else {
                $data['image'] = null; 
            }
        }
        /* Crear curso con informacion validada */
        Course::create($data);

        return to_route('courses.index')->with('success', 'Curso creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        /* Retorna vista show */
        return view('lms.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        /* Obtener informacion de atributo fonaneo solo id, nombre */
        $status = Course_status::pluck('id', 'name');
        return view('lms.course.edit', compact('status', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        /* Obtiene del request infromacion validada */
        $data = $request->validated();
        /* Manejo de imagen */
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/courses'), $filename);
            // guardar SOLO el nombre o la ruta
            $data['image'] = 'uploads/courses/' . $filename;
        }
        /* Actualiza infromacion */
        $course->update($data);
        return to_route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $delete = $course -> delete();
        return to_route('courses.index')->with('success', 'Curso borrado correctamente.');
    }
}
