<!--VISTA CREAR RECETA (Falta agregarle el css @jair ayuda) -->
@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="css/crearreceta.css">
@endsection

@section('content')
<div class="contenedor">
    <h1>Crear Nueva Receta</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('crearreceta') }}" method="post">
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input class="input" type="text" name="nombre" value="{{ old('nombre') }}" required><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea class="input" style="height: 100px;" name="descripcion" required>{{ old('descripcion') }}</textarea><br>

        <label for="etiquetas">Etiquetas (separadas por coma):</label><br>
        <input class="input" type="text" name="etiquetas" value="{{ old('etiquetas') }}" required><br>

        <label for="link">Link .jpg (dejar vacío si no tiene):</label><br>
        <input class="input" type="text" name="link" value="{{ old('link') }}"><br>

        <label for="ingredientes">Ingredientes:</label><br>
        <textarea class="input" style="height: 100px;" name="ingredientes" required>{{ old('ingredientes') }}</textarea><br>

        <label for="preparacion">Preparación:</label><br>
        <textarea class="input" style="height: 100px;" name="preparacion" required>{{ old('preparacion') }}</textarea><br>
        <div align=center>
            <button type="submit" class="boton">Crear Receta</button>
        </div>
    </form>
</div>
@endsection