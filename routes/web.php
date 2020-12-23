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

Route::get('/', [App\Http\Controllers\AutoresController::class, 'index']);

Route::get('/editoriales', [App\Http\Controllers\EditorialesController::class, 'index'])->name('editoriales');
Route::post('/editoriales', [App\Http\Controllers\EditorialesController::class, 'store'])->name('NewEditorial'); 

Route::get('/libros', [App\Http\Controllers\LibrosController::class, 'index'])->name('libros');
Route::post('/libros', [App\Http\Controllers\LibrosController::class, 'store'])->name('NewBook'); 