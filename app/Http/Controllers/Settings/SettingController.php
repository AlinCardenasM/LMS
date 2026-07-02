<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Setting $setting)
    {
        $setting = Setting::first();
        return view('lms.settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Setting $setting)
    {
        return view('lms.settings.create', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        $data=$request->validated();

        /* Manejo de imagen */
        if ($request->hasFile('image')) {
            /* Crear nombre de imagen */
            $filename = time() . '.' . $request->image->extension();
            /* Obtener imagen y enviarla a carpeta uploads/courses */
            $request->image->move(public_path('uploads/logos'), $filename);
            // guardar SOLO el nombre o la ruta
            $data['image'] = 'uploads/logos/' . $filename;
        }
        /* Crear curso con informacion validada */
        Setting::create($data);

        return to_route('courses.index');
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
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $data=$request->validated();

        /* Manejo de imagen */
        if ($request->hasFile('image')) {
            /* Crear nombre de imagen */
            $filename = time() . '.' . $request->image->extension();
            /* Obtener imagen y enviarla a carpeta uploads/courses */
            $request->image->move(public_path('uploads/logos'), $filename);
            // guardar SOLO el nombre o la ruta
            $data['image'] = 'uploads/logos/' . $filename;
        }

        $setting->update($data);
        return to_route('courses.index')->with('success', 'Configuración actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
