<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function filtrarRecetashome(Request $request)
    {
        $opcion = $request->input('opcion');

        // Filtrar recetas según etiquetas y si fue publicada.
        $recetas = Receta::where('etiquetas', 'like', "%$opcion%")
            ->where('publicada', true)
            ->get();
        return view('recetas.misrecetas', compact('recetas'));
    }
    public function publicadas()
    {
        if (!auth()->check()) {
            return view('usuario.usuario');
        } else {
            // Db obtener = recetas publicadas
            $recetas = Receta::where('publicada', true)->get();
            return view('recetas/home', compact('recetas'));
        }
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
