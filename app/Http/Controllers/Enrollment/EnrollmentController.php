<?php

namespace App\Http\Controllers\Enrollment;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lms.enrollment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'access_code' => 'required'
        ]);

        $course = Course::where('access_code', strtoupper($request->access_code))->first();
        /* dd($course->id); */

        if (! $course) {
            return back()->withErrors(['access_code' => 'Código de acceso inválido.']);
        }

        if ($request->user()
            ->courses()
            ->where('courses.id', $course->id)
            ->exists()) {

            return back()->withErrors([
                'access_code' => 'Ya estás inscrito en este curso.'
            ]);
        }

        Enrollment::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
        ]);

        return redirect()
        ->route('courses.index')
        ->with('success', 'Te has inscrito correctamente');
    }
}
