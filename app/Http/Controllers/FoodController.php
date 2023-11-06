<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function listRecetas(){
        return view('recetas.home');
    }

    public function detailsRecetas(){
        return view('recetas.detalles');
    }

    public function registroUsuario(){
        return view('usuario.usuario');
    }

    public function iniciarSesion(){
        return view('usuario.iniciarsesion');
    }

    public function Registro(){
        return view('usuario.registro');
    }
}
