<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ProductoController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Registrar usuarios
Route::get('/registrar',[RegistrarController::class,'vistaRegistrar'])->middleware('guest')->name('sistema.registroIndex');
Route::post('/registrar',[RegistrarController::class,'registrar'])->name('sistema.registrar');

//Sesion
Route::get('/login',[SesionController::class,'vistaLogin'])->middleware('guest')->name('sistema.vistaLogin');
Route::post('/login',[SesionController::class,'login'])->name('sistema.login');
Route::post('/logout',[SesionController::class,'logout'])->middleware('auth')->name('sistema.logout');

//Sistema de productos
Route::get('/inicio',[SistemaController::class,'inicio'])->name('sistema.inicio');

Route::get('/productos',[ProductoController::class,'index'])->name('productos.productos');
Route::get('/carga',[ProductoController::class,'create'])->name('productos.create');
Route::post('/carga',[ProductoController::class,'store'])->name('productos.store');
Route::get('/editar/{id}',[ProductoController::class,'edit'])->name('productos.edit');
Route::put('/editar/{id}',[ProductoController::class,'update'])->name('productos.update');
Route::delete('/editar/{id}',[ProductoController::class,'destroy'])->name('productos.destroy');