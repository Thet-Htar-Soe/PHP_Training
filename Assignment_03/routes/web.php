<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
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

Route::get('/',function() {
   return view("index");
});

Route::get('/major',[MajorController::class,"index"]);
Route::get('/major/create',[MajorController::class,"create"]);
Route::post('/major/store',[MajorController::class,"store"]);
Route::get('/major/edit/{id}',[MajorController::class,"edit"]);
Route::put('/major/update/{id}',[MajorController::class,"update"]);
Route::delete('/major/delete/{id}',[MajorController::class,"delete"]);

Route::get('/student',[StudentController::class,"index"]);
Route::get('/student/create',[StudentController::class,"create"]);
Route::post('/student/store',[StudentController::class,"store"]);
Route::get('/student/edit/{id}',[StudentController::class,"edit"]);
Route::put('/student/update/{id}',[StudentController::class,"update"]);
Route::delete('/student/delete/{id}',[StudentController::class,"delete"]);

Route::get('/student/import',[StudentController::class,"import"]);
Route::post('/student/import',[StudentController::class,"uploadStudents"]);
Route::get('/student/export',[StudentController::class,"exportStudents"]);

Route::post('/student/search',[StudentController::class,"search"]);