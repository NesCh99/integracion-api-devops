<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
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
    return view('home');
});

Route::resource('usuarios', UsuarioController::class)->names('usuarios');
Route::resource('libros', LibroController::class)->names('libros');
Route::get('libros/{libreriaId}/asignar/{usuarioId}', 'App\Http\Controllers\LibroController@asignar')->name('libros.asignar');
Route::get('libros/{libreriaId}/quitar/{usuarioId}', 'App\Http\Controllers\LibroController@quitar')->name('libros.quitar');
