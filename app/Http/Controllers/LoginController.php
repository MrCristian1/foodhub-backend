<?php

namespace App\Http\Controllers;
use App\Models\Receta;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    public function Usuario(){
        if (auth()->check()) {
            return redirect()->route('home');
        } else {
            return view('usuario.usuario');
        }   
    }

    public function iniciarSesion(){
        if (auth()->check()) {
            return redirect()->route('home');
        } else {
            return view('usuario.iniciarsesion');
        }
    }

    public function Registro(){
        if (auth()->check()) {
            return redirect()->route('home');
        } else {
            return view('usuario.registro');
        }
    }
    


}
