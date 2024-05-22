<?php

use App\Http\Controllers\DasboardController;
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
//Route untuk menampilkan teks salam
Route::get('admin/dashboard', [DasboardController::class, 'index']);