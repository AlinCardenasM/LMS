<?php

use App\Http\Controllers\Assigments\AssigmentController;
use App\Http\Controllers\Assignments\AssignmentController;
use App\Http\Controllers\Contents\ContentController;
use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\Modules\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Submissions\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('courses', CourseController::class);
Route::resource('courses.modules', ModuleController::class);
Route::resource('courses.contents', ContentController::class);
Route::resource('courses.assignments', AssignmentController::class);
Route::resource('courses.assignments.submissions', SubmissionController::class);

require __DIR__.'/auth.php';
