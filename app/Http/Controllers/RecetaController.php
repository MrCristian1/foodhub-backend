<?php


    namespace App\Http\Controllers;
    use App\Models\Comentario;
    use Illuminate\Http\Request;
    use App\Models\Receta;
    use Illuminate\Support\Facades\Auth;
    class RecetaController extends Controller
    {

        public function misRecetas()
    {
    // Obtener el ID del usuario autenticado
    $userId = Auth::id();

    // Obtener las recetas del usuario autenticado
    $recetas = Receta::where('user_id', $userId)->get();

    return view('recetas.misrecetas', compact('recetas'));
    }
    public function filtrarRecetas(Request $request)
{
    $opcion = $request->input('opcion');
    
    // ID USUARIO LOGEADO.
    $userId = auth()->id();
    
    // Filtrar recetas según etiquetas y usuario de creación.
    $recetas = Receta::where('etiquetas', 'like', "%$opcion%")
                      ->where('user_id', $userId)
                      ->get();

    return view('recetas.misrecetas', compact('recetas'));
}
    

        public function mostrarDetalles($id)
    {
        // Obtener la receta específica desde la base de datos
        $receta = Receta::findOrFail($id);

        $comentario = $receta->comentario;

        // Pasar la receta a la vista
        return view('recetas/detalles', compact('receta', 'comentario'));
    }

    public function crearRecetaForm()
{
    //vista formulario para crear receta
    return view('recetas.crearreceta');
}

public function crearReceta(Request $request)
{
    // VALIDACIONES RECETA.
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'etiquetas' => 'required|string',
        'link' => 'nullable|string',
        'ingredientes' => 'required|string',
        'preparacion' => 'required|string',
    ]);
    //CAPTURA DE DATOS PARA CREAR RECETA.
    $user = auth()->user();
    $receta = new Receta([
        'user_id' => $user->id,
        'nombre' => $request->input('nombre'),
        'descripcion' => $request->input('descripcion'),
        'etiquetas' => $request->input('etiquetas'),
        'link' => $request->input('link'),
        'ingredientes' => $request->input('ingredientes'),
        'preparacion' => $request->input('preparacion'),
    ]);

    $receta->save();

    return redirect()->route('misrecetas')->with('status', 'Receta creada exitosamente.');
}

public function publicarReceta($id)
{
    // Db Obtener = IdReceta
    $receta = Receta::findOrFail($id);

    // Atributo -publicado
    $receta->publicada = true;
    $receta->save();

    // Redireccionar y mensaje de éxito :)
    return redirect()->route('misrecetas')->with('status', 'Receta publicada exitosamente.');
}


public function eliminarPost($id)
{



    // Obtén la receta por su ID
    $receta = Receta::find($id);

    // Verifica si la receta existe y si es un administrador
    if ($receta && auth()->user()) {
        // Mensaje de registro para verificar que la función se está ejecutando
        \Log::info('Eliminar post: Función ejecutada correctamente');

        // Cambia el estado de publicación a false
        $receta->update(['publicada' => false]);
        

        // Mensaje de registro para verificar si la actualización se realiza correctamente
        \Log::info('Eliminar post: Publicada actualizada a false');

        // Puedes agregar más lógica aquí, como redireccionar a la página principal o mostrar un mensaje de éxito
    } else {
        // Mensaje de registro para verificar si la receta no existe o el usuario no es un administrador
        \Log::info('Eliminar post: Receta no encontrada o usuario no autorizado');

    }

    // Redirige de vuelta a la página de detalles de la receta
        return redirect()->route('home')->with('status', 'Receta eliminada exitosamente.');
        }

        public function favoritas()
    {
        // Obtén las recetas favoritas del usuario autenticado
        $recetasFavoritas = auth()->user()->recetasFavoritas;

        return view('recetas/favoritos', compact('recetasFavoritas'));
    }
    public function agregarFavorito($id)
    {
        // Obtén la receta por su ID
        $receta = Receta::findOrFail($id);  

        // Verifica si la receta ya está en las favoritas del usuario
        if (!Auth::user()->recetasFavoritas->contains($receta)) {
            // Agrega la receta a las favoritas del usuario autenticado
            Auth::user()->recetasFavoritas()->attach($receta);
            return redirect()->route('home')->with('status', 'Receta agregada a favoritos');
        }

        return redirect()->route('home')->with('warning', 'La receta ya está en tus favoritos');
    }

        public function quitarFavorito($id)
        {
          Auth::user()->recetasFavoritas()->detach($id);

          return redirect()->route('home')->with('status', 'Receta eliminada de favoritos');
        }


public function eliminarReceta($id)
{
    // Eliminar comentarios de la receta
    Comentario::where('receta_id', $id)->delete();
    // Obtén la receta por su ID
    $receta = Receta::find($id);

    // Verifica si la receta existe y si el usuario autenticado es el creador
    if ($receta && auth()->user()->id == $receta->user_id) {
        // Elimina la receta
        $receta->delete();

        // Puedes agregar más lógica aquí, como redireccionar a la página principal o mostrar un mensaje de éxito
        return redirect()->route('misrecetas')->with('status', 'Receta eliminada correctamente');
    } else {
        // Maneja el caso en el que la receta no existe o el usuario no es el creador
        return redirect()->back()->with('error', 'No tienes permisos para eliminar esta receta');
    }
}



}