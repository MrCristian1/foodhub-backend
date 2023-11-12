<?php


    namespace App\Http\Controllers;

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

        // Pasar la receta a la vista
        return view('recetas/detalles', compact('receta'));
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

    }