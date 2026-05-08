<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Module\StoreModuleRequest;
use App\Http\Requests\Module\UpdateModuleRequest;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        /* Obtener modulos relacionados a cursos */
        $modules = $course->modules;
        return view('lms.module.index', compact('course', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        /* geenra intancia para crear modulo */
        $module = new Module();
        return view('lms.module.create', compact('module', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuleRequest $request, Course $course)
    {
        /* Obtener informacion validada */
        $data = $request->validated();
        /* Aqui se envía el id que se obtiene de la URL */
        $data['course_id'] = $course->id;
        /* COn la data validada se crea el modulo */
        Module::create($data);
        return to_route('courses.modules.index', compact('course'))->with('success', 'Módulo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Module $module )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Module $module)
    {
        return view('lms.module.edit', compact('module', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request, Course $course, Module $module)
    {
        /* Obtener infromacion validada */
        $data = $request->validated();
        /* Actualizar infromacion */
        $module->update($data);
        return to_route('courses.modules.index', compact('course'))->with('success', 'Módulo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Module $module)
    {
        $delete = $module -> delete();
        return to_route('courses.modules.index', compact('course'))->with('success', 'Módulo eliminado correctamente.');;
    }
}
