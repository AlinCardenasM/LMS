<?php

use App\Http\Controllers\Assigments\AssigmentController;
use App\Http\Controllers\Assignments\AssignmentController;
use App\Http\Controllers\Contents\ContentController;
use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\Enrollment\EnrollmentController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Modules\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Submissions\SubmissionController;
use App\Http\Controllers\Submissions\SubmissionToProfessor;
use App\Http\Controllers\UsersList\UserListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login-student');
});

Route::get('/students-register', function () {
    return view('auth.register-student');
})->name('students.register');

Route::get('/admin-register', function () {
    return view('auth.register');
})->name('admin.register');

Route::get('/dashboard', function () {
    return to_route('courses.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'student.restriction'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/student-register', function() {
        return view('auth.register-student.blade');
    });

    Route::resource('courses', CourseController::class);
    Route::resource('courses.modules', ModuleController::class);
    Route::resource('courses.contents', ContentController::class);
    Route::resource('courses.assignments', AssignmentController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('courses.users', UserListController::class);
    Route::resource('settings', SettingController::class);
    // Listado de calificaciones del curso
Route::get(
    'courses/{course}/grade',
    [GradeController::class, 'index']
)->name('courses.grades.index');

// Formulario para crear una calificación
Route::get(
    'courses/{course}/assignments/{assignment}/submissions/{submission}/grade',
    [GradeController::class, 'create']
)->name('submissions.grade.create');

// Guardar la calificación
Route::post(
    'courses/{course}/assignments/{assignment}/submissions/{submission}/grade',
    [GradeController::class, 'store']
)->name('submissions.grade.store');

// Formulario para editar la calificación
Route::get(
    'courses/{course}/assignments/{assignment}/submissions/{submission}/grade/edit',
    [GradeController::class, 'edit']
)->name('submissions.grade.edit');

// Actualizar la calificación
Route::put(
    'courses/{course}/assignments/{assignment}/submissions/{submission}/grade',
    [GradeController::class, 'update']
)->name('submissions.grade.update');
});

Route::resource('courses.assignments.submissions', SubmissionController::class);
Route::get(
    'courses/{course}/assignments/{assignment}/review',
    [AssignmentController::class, 'review']
)->name('assignments.review');


require __DIR__.'/auth.php';
