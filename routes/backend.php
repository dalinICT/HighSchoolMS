<?php

use Illuminate\Support\Facades\Route;

Route::get('/adminback', function () {
    return view('admin.index');
});




// Student Route
Route::get('/create/students', [App\Http\Controllers\Page\StudentController::class, 'create'])->name('students.create');
Route::get('/show/students', [App\Http\Controllers\Page\StudentController::class, 'show'])->name('students.show');

