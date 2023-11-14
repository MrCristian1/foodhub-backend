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
        <a class="nav-link" href="../favoritos">FAVORITOS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../misrecetas">MIS RECETAS</a>
    </li>
@endsection

@section('detail')
    <div class="contenedor">
        <div class="row post">
            <img src="{{ $receta->link ? asset($receta->link) : asset('img/default.png') }}"
                alt="Imagen"class="img-receta">
            <div class="col-md-7">
                <h1>{{ $receta->nombre }}</h1>
                <p style="text-align: justify; font-size: 17px"><b>Descripción: </b>{{ $receta->descripcion }}</p>
                <b>Etiquetas:</b> {{ $receta->etiquetas }}<br><br>
                <!--ss-->
                @role('usuario')
                    <!-- Agregar a favoritos -->
                    <form action="{{ route('favoritos.agregar', ['id' => $receta->id]) }}" method="POST"
                        style="margin-left: 0;">
                        @csrf
                        <button type="submit" class="boton">Agregar a Favoritos</button>
                    </form>
                    <!-- Quitar de favoritos -->
                    <form action="{{ route('favoritos.quitar', ['id' => $receta->id]) }}" method="POST"
                        style="margin-left: 0;">
                        @csrf
                        <button type="submit" class="boton" style="margin-top: 10px;">Quitar de Favoritos</button>
                    </form>
                @endrole
                <!-- BOTÓN BORRAR PUBLICACIÓN (solo para admins o el creador) -->
                @if (
                    (Auth::user()->hasRole('administrador') ||
                        (Auth::user()->hasRole('usuario') && Auth::user()->id == $receta->user_id)) &&
                        $receta->publicada)
                    <form action="{{ route('eliminar.post', ['id' => $receta->id]) }}" method="POST" style="margin: 0;">
                        @csrf
                        <button class="borrar" type="submit" style="margin-top: 8px;">Eliminar Post</button>
                    </form>
                @endif
                <!-- Botón Eliminar Receta (solo para el creador y si la receta no está publicada) -->
                @if (Auth::user()->id == $receta->user_id && !$receta->publicada)
                    <form action="{{ route('eliminar.receta', ['id' => $receta->id]) }}" method="POST"
                        style="margin-left: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="borrar" style="margin-top: 8px;">Eliminar Receta</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="post">
            <h2>Ingredientes</h2>
            <p style="text-align: justify; white-space: pre-line; font-size: 18px;">{{ $receta->ingredientes }}</p>
            <h2>Procedimiento</h2>
            <p style="text-align: justify; white-space: pre-line; font-size: 18px;">{{ $receta->preparacion }}</p>
        </div>
    </div>
@endsection

@section('comments')

    <footer class="comentarios-footer">
        <div class="comentarios-container">

            <h2 style="color: #fff; text-align: center;">Comentarios</h2>

            @if ($comentario)
                @foreach ($comentario as $comentario)
                    <div class="comentario">
                        <h3 class="username">{{ $comentario->user->name }}</h3>
                        <p style="font-size: 18px;">{{ $comentario->contenido }}</p>
                    </div>
                @endforeach
            @else
                <p>No hay comentarios.</p>
            @endif


            <div class="comentario">
                <form action="{{ route('comentario', $receta) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label align=center> Nombre </label>
                        <input class="form -control input" type="text" value="{{ Auth::user()->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label align=center> Email </label>
                        <input class="form-control input" type="text" value="{{ Auth::user()->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label align=center> Mensaje </label>
                        <textarea class="form-control input" style="height: 100px; text-align: left;" name="contenido" rows="4" required></textarea>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="receta_id" value="{{ $receta->id }}">
                    </div>
                    <div align=center>
                        <button type="submit" class="boton-comentario">Enviar Comentario</button>
                    </div>
                </form>
            </div>
        </div>
    </footer>
@endsection
