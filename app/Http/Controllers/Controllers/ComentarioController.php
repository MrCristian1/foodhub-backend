<?php

namespace App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use App\Models\Receta;
use Illuminate\Http\Request;
use App\Http\Requests\ComentarioRequest;
class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(ComentarioRequest $request, Receta $receta)
    {
        // Obtener el ID de la receta desde la solicitud
        $receta_id = $request->input('receta_id');

        // Crear el comentario utilizando el modelo Comentario
        $comentario = Comentario::create([
            'user_id' => auth()->id(),
            'receta_id' => $receta_id,
            'contenido' => $request->input('contenido'),
            // ... otros campos del comentario
        ]);

        // Puedes redirigir a la página de detalles de la receta o a donde desees
        return redirect()->route('detalles.receta', ['id' => $receta_id])->with('mensaje', 'Comentario recibido con éxito');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
