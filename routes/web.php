<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, "index"])->name('home');
Route::get('/login', [UserController::class, "index"])->name('home');
Route::post('/auth/login', [UserController::class, "login"])->name('auth.login');
Route::get('/home', [UserController::class, "index"])->name('home');
Route::get('/dashboard', [UserController::class, "dashboard"])->name('dashboard')->middleware(['auth']);
Route::get('/profile', [UserController::class, "profile"])->name('profile')->middleware(['auth']);
Route::get('/results', [ResultController::class, "results"])->name('results')->middleware(['auth']);
Route::get('/upload/result/{id}', [ResultController::class, "upload_result"])->name('upload.result')->middleware(['auth']);
Route::post('/post/upload/result', [ResultController::class, "post_upload_result"])->name('upload_result')->middleware(['auth']);
Route::get('/courses', [CourseController::class, "courses"])->name('courses')->middleware(['auth']);
Route::get('/logout', [UserController::class, "logout"])->name('logout')->middleware(['auth']);
Route::get('/add/course/{id}', [CourseController::class, "add_course"])->name('add.course')->middleware(['auth']);
Route::get('/drop/course/{id}', [CourseController::class, "drop_course"])->name('drop.course')->middleware(['auth']);