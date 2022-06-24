<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $url = "/home/siraj/Downloads/astu_year_book/public/storage/students/DPQcI2Cwc6frjGOJUCebwlmbPX9kxy-metacGhvdG9fMjAyMS0wNi0wOF8xNS0xNS0wOC5qcGc=-.jpg";
    Storage::disk('public')->delete($url);
});
