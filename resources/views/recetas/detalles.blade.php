<!--VISTA DETALLES RECETA -->
@extends('layout.main')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
@endsection

@section('href')
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="../home">INICIO</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../#">FAVORITOS</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../misrecetas">MIS RECETAS</a>
</li>
@endsection

@section('detail')
<div class="contenedor">
    <div class="row post">
        <img src="{{ $receta->link ? asset($receta->link) : asset('img/default.png') }}" alt="Imagen"class="img-receta">
        <div class="col-md-7">
            @role('administrador')
            <!--BOTÓN BORRAR PUBLICACIÓN (solo para admins)-->
            <form action="{{ route('eliminar.post', ['id' => $receta->id]) }}" method="POST">
            @csrf
    <button class="buton borrar" type="submit">Eliminar Receta</button>
</form>
            
            @endrole
            <h1>{{ $receta->nombre }}</h1>
            <p style="text-align: justify;">{{ $receta->descripcion }}</p>
            <b>Etiquetas:</b> {{ $receta->etiquetas }}<br><br>
            <button type="button" class="boton">Añadir a favoritos</button>
        </div>
    </div>
    <div class="post">
        <h2>Ingredientes</h2>
        <p style="text-align: justify;">{{ $receta->ingredientes }}</p>
        <h2>Procedimiento</h2>
        <p style="text-align: justify;">{{ $receta->preparacion }}</p>

    </div>
</div>

<footer class="comentarios-footer">
    <div class="comentarios-container">
        <h2 style="color: #fff; text-align: center;">Comentarios</h2>
        <div align=center><button type="button" class="boton-comentario">Añadir Comentario</button></div><br>
        <div class="comentario">
            <h3 style="color: #e89c7c;">Usuario 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="comentario">
            <h3 style="color: #e89c7c;">Usuario 2</h3>
            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="comentario">
            <h3 style="color: #e89c7c;">Usuario 3</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
        </div>
    </div>
</footer>
@endsection