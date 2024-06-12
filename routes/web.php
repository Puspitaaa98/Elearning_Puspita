<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\StudentController;

/**
 * 1. Get    : Untuk menampilkan
 * 2. Post   : untuk mengirim data
 * 3. Put    : Untuk meng-update data
 * 4. Delete : untuk menghapus data
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    //Route untuk menampilkan Dashboard
Route::get('admin/dashboard', [DasboardController::class, 'index'])->name('dashboard');


// Route untuk menampilkan halaman student
Route::get('admin/student', [StudentController::class, 'index']);

//Route untuk menampilkan halaman form tambah student
Route::get('admin/student/create',[StudentController::class, 'create']);

//Route untuk mengirim data student baru
Route::post('admin/student/store', [StudentController::class, 'store']);

//Route untuk menampilkan halaman form edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

//Route untuk menyimpan hasil update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

//Route untuk menghapus student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

//----------------------------------------------------------------------------------------//

//Route untuk menampilkan halaman course
Route::get('admin/course', [CourseController::class, 'index']);

//Route untuk menampilkan halaman form tambah course
Route::get('admin/course/create',[CourseController::class, 'create']);

//Route untuk mengirim data course baru
Route::post('admin/course/store', [CourseController::class, 'store']);

//Route untuk menampilkan halaman form edit course
Route::get('admin/course/edit/{id}', [CourseController::class, 'edit']);

//Route untuk menyimpan hasil update course
Route::put('admin/course/update/{id}', [CourseController::class, 'update']);

//Route untuk menghapus course
Route::delete('admin/course/delete/{id}', [CourseController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
