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
            <img src="{{ $receta->link ? asset($receta->link) : asset('img/default.png') }}"
                alt="Imagen"class="img-receta">
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

            @if ($comentario)
                @foreach ($comentario as $comentario)
                    <div class="comentario">
                        <h3>{{ $comentario->user->name }}</h3>
                        <p>{{ $comentario->contenido }}</p>
                    </div>
                @endforeach
            @else
                <p>No hay comentarios.</p>
            @endif


            <div class="comentario">
                <form action="{{ route('comentario', $receta) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label> Nombre </label>
                        <input class="form -control" type="text" value="{{ Auth::user()->name }} " readonly>
                    </div>

                    <div class="form-group">
                        <label> Email </label>
                        <input class="form-control" type="text" value="{{ Auth::user()->email }} " readonly>
                    </div>

                    <div class="form-group">
                        <label> Mensaje </label>
                        <textarea class="form-control" name="contenido" rows="4" required></textarea>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="receta_id" value="{{ $receta->id }}">
                    </div>
                    <button type="submit">Enviar Comentario</button>
                </form>

                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }

                    form {
                        max-width: 400px;
                        margin: 0 auto;
                    }

                    label {
                        display: block;
                        margin-bottom: 8px;
                    }

                    input,
                    textarea {
                        width: 100%;
                        padding: 8px;
                        margin-bottom: 16px;
                        box-sizing: border-box;
                    }

                    button {
                        background-color: #4caf50;
                        color: white;
                        padding: 10px 15px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    }

                    button:hover {
                        background-color: #45a049;
                    }
                </style>

            </div>



            <!--
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
                    -->
        </div>
    </footer>
@endsection



