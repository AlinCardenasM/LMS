<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentRestriction
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */

    protected array $restrictedRoutes = [
        // Cursos — alumnos solo pueden ver (index, show)
        'courses.create',
        'courses.store',
        'courses.edit',
        'courses.update',
        'courses.destroy',

        // Módulos — alumnos solo pueden ver
        'courses.modules.create',
        'courses.modules.store',
        'courses.modules.edit',
        'courses.modules.update',
        'courses.modules.destroy',

        // Contenidos — alumnos solo pueden ver
        'courses.contents.create',
        'courses.contents.store',
        'courses.contents.edit',
        'courses.contents.update',
        'courses.contents.destroy',

        // Tareas — alumnos solo pueden ver
        'courses.assignments.create',
        'courses.assignments.store',
        'courses.assignments.edit',
        'courses.assignments.update',
        'courses.assignments.destroy',

        //Lista de usuarios en cursos
        'courses.users.destroy'

        /* // Entregas — alumnos pueden crear (store) pero no editar ni eliminar
        'courses.assignments.submissions.edit',
        'courses.assignments.submissions.update',
        'courses.assignments.submissions.destroy', */
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Si es maestro, acceso total sin ninguna restricción
        if ($user->role === 'profesor') {
            return $next($request);
        }

        // Si es alumno, verificar si la ruta actual está bloqueada
        foreach ($this->restrictedRoutes as $route) {
            if ($request->routeIs($route)) {
                abort(403, 'No tienes permiso para realizar esta acción.');
            }
        }   
        return $next($request);
    }
}
