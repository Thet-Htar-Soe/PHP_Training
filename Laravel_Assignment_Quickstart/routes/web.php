<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class,'create']);
Route::post('/store',[TaskController::class,'store']);
Route::delete('/delete/{id}',[TaskController::class,'delete']);
Route::get('/edit/{id}',[TaskController::class,'edit']);
Route::put('/edit/{id}',[TaskController::class,'update']);
