<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('student/index', [\App\Http\Controllers\StudentController::class, 'index']);
Route::get('student/add', [\App\Http\Controllers\StudentController::class, 'add']);
Route::post('student/edit', [\App\Http\Controllers\StudentController::class, 'edit']);
Route::get('student/delete', [\App\Http\Controllers\StudentController::class, 'delete']);

