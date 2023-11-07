@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="css/home.css">
@endsection

@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
<form class="d-flex" role="search">
    <select class="form-select me-2" aria-label="Search">
        <option value="" class="option">Selecciona una opción</option>
        <option value="carnes" class="option">Carnes</option>
        <option value="pescado" class="option">Pescado</option>
        <option value="frutas" class="option">Frutas</option>
        <option value="verduras" class="option">Verduras</option>
    </select>
    <button class="boton-buscar" type="submit">Buscar</button>
</form>

<div id="contenedor" class="contenedor">
    <div class="post">
        <img src="img/hamburguesa.png" alt="Imagen" class="imagen-post">
        <div class="info-post">
            <h2>Nombre Receta</h2>
            <div class="etiqueta"><b>Etiquetas:</b> Etiquetas.</div><br>
            <input type="hidden" name="post_id" value="1">
            <a href="detalles"><button class="boton">Ver Receta</button></a>
        </div>
    </div>


    <div class="post">
        <img src="img/hamburguesa.png" alt="Imagen" class="imagen-post">
        <div class="info-post">
            <h2>Nombre Receta</h2>
            <div class="etiqueta"><b>Etiquetas:</b> Etiquetas.</div><br>
            <input type="hidden" name="post_id" value="1">
            <a href="detalles"><button class="boton">Ver Receta</button></a>
        </div>
    </div>


    <div class="post">
        <img src="img/hamburguesa.png" alt="Imagen" class="imagen-post">
        <div class="info-post">
            <h2>Nombre Receta</h2>
            <div class="etiqueta"><b>Etiquetas:</b> Etiquetas.</div><br>
            <input type="hidden" name="post_id" value="1">
            <a href="detalles"><button class="boton">Ver Receta</button></a>
        </div>
    </div>


    <div class="post">
        <img src="img/hamburguesa.png" alt="Imagen" class="imagen-post">
        <div class="info-post">
            <h2>Nombre Receta</h2>
            <div class="etiqueta"><b>Etiquetas:</b> Etiquetas.</div><br>
            <input type="hidden" name="post_id" value="1">
            <a href="detalles"><button class="boton">Ver Receta</button></a>
        </div>
    </div>


    <div class="post">
        <img src="img/hamburguesa.png" alt="Imagen" class="imagen-post">
        <div class="info-post">
            <h2>Nombre Receta</h2>
            <div class="etiqueta"><b>Etiquetas:</b> Etiquetas.</div><br>
            <input type="hidden" name="post_id" value="1">
            <a href="detalles"><button class="boton">Ver Receta</button></a>
        </div>
    </div>


    <div class="post">
        <img src="img/hamburguesa.png" alt="Imagen" class="imagen-post">
        <div class="info-post">
            <h2>Nombre Receta</h2>
            <div class="etiqueta"><b>Etiquetas:</b> Etiquetas.</div><br>
            <input type="hidden" name="post_id" value="1">
            <a href="detalles"><button class="boton">Ver Receta</button></a>
        </div>
    </div>
</div>
@endsection


