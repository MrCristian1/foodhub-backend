<!--VISTA MIS RECETAS -->
@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <form class="d-flex" role="search" method="GET" action="{{ route('filtrar.recetas') }}">
        @csrf
        <select name="opcion" class="form-select me-2" aria-label="Search">
            <option value="" class="option">Selecciona una opción</option>
            <option value="carnes" class="option">Carnes</option>
            <option value="arroz" class="option">Arroz</option>
            <option value="Pollo" class="option">Pollo</option>
            <option value="verduras" class="option">Verduras</option>
            <option value="pan" class="option">Pan</option>
            <option value="queso" class="option">Queso</option>
        </select>
        <button type="submit" class="boton-buscar">Buscar</button>
    </form>
    <div id="contenedor" class="contenedor">
        <div class="post"> <img src="img/suma.png" alt="Imagen" class="imagen-post">
            <div class="info-post"> <input type="hidden" name="post_id" value="1"> <a href="crearreceta"><button
                        class="boton" style="height: 30%;">AÑADIR RECETA</button>
                </a>
            </div>
        </div>

        @foreach ($recetas as $receta)
            <div class="post">
                <img src="{{ $receta->link ?? 'img/default.png' }}" alt="Imagen" class="imagen-post">
                <div class="info-post">
                    <h2>{{ $receta->nombre }}</h2>
                    <div class="etiqueta"><b>Etiquetas:</b> {{ $receta->etiquetas }}</div><br>
                    <input type="hidden" name="post_id" value="{{ $receta->id }}">
                    @if (!$receta->publicada)
                        <form action="{{ route('publicar.receta', ['id' => $receta->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="boton-publicar">Publicar</button>
                        </form>
                    @else
                        <a href="{{ route('detalles', ['id' => $receta->id]) }}">
                            <button class="boton">Ver Receta</button>
                        </a>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@endsection
