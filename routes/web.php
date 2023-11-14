<?php

use App\Http\Controllers\Controllers\ComentarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas de LOGIN

Route::get('/', [LoginController::class, 'Usuario'])->name('pagina-principal');
Route::get('iniciarSesion', [LoginController::class, 'iniciarSesion']);
Route::get('registro', [LoginController::class, 'Registro']);

// Rutas de HOME

Route::get('home', [HomeController::class, 'publicadas'])->name('home');
Route::get('/filtrar-recetashome', [HomeController::class, 'filtrarRecetashome'])->name('filtrar.recetashome');

//RUTAS de MIS RECETAS
Route::get('misrecetas', [RecetaController::class, 'misRecetas'])->name('misrecetas');
Route::get('misrecetas/{id}', [RecetaController::class, 'mostrarDetalles'])->name('detalles.receta');
Route::get('/filtrar-recetas', [RecetaController::class, 'filtrarRecetas'])->name('filtrar.recetas');
Route::post('/publicar-receta/{id}', [RecetaController::class, 'publicarReceta'])->name('publicar.receta');
Route::get('/crearreceta', [RecetaController::class, 'crearRecetaForm'])->name('crearreceta.form');
Route::post('/crearreceta', [RecetaController::class, 'crearReceta'])->name('crearreceta');

//RUTAS de COMENTARIOS
Route::post('comentario/{post}', [ComentarioController::class, 'guardar'])->name('comentario');


// RUTA DETALLE 
Route::get('/detalles/{id}', [RecetaController::class, 'mostrarDetalles'])->name('detalles');
Route::post('/eliminar-post/{id}', [RecetaController::class, 'eliminarPost'])->name('eliminar.post');


Auth::routes();
