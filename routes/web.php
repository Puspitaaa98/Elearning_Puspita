<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\StudentController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * 1. Get    : Untuk menampilkan
 * 2. Post   : untuk mengirim data
 * 3. Put    : Untuk meng-update data
 * 4. Delete : untuk menghapus data
 */
//Route untuk menampilkan Dashboard
Route::get('admin/dashboard', [DasboardController::class, 'index']);


// Route untuk menampilkan halaman student
Route::get('admin/student', [StudentController::class, 'index']);

//Route untuk menampilkan halaman course
Route::get('admin/course', [CourseController::class, 'index']);

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