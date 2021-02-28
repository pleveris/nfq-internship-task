<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;

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


Route::resource('students', StudentController::class);
Route::resource('projects', ProjectController::class);

Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');

Route::get('/students/create/{project}', [App\Http\Controllers\StudentController::class, 'create' ])->name('students.add');
Route::post('/students/store/{proj_id}', [App\Http\Controllers\StudentController::class, 'store' ])->name('students.store');
// status
Route::get('/get-status', [App\Http\Controllers\StatusController::class, 'get_status']);