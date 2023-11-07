<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [FoodController::class, 'registroUsuario'])->name('pagina-principal');
Route::get('iniciarSesion', [FoodController::class, 'iniciarSesion']);
Route::get('registro', [FoodController::class, 'Registro']);

Route::get('home', [FoodController::class, 'listRecetas']);
Route::get('detalles', [FoodController::class, 'detailsRecetas']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
