<!--VISTA CREAR RECETA (Falta agregarle el css @jair ayuda) -->
@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="css/crearreceta.css">
@endsection

@section('content')
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

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required>{{ old('descripcion') }}</textarea>

        <label for="etiquetas">Etiquetas (separadas por coma):</label>
        <input type="text" name="etiquetas" value="{{ old('etiquetas') }}" required>

        <label for="link">Link .jpg (dejar vacío si no tiene):</label>
        <input type="text" name="link" value="{{ old('link') }}">

        <label for="ingredientes">Ingredientes:</label>
        <textarea name="ingredientes" required>{{ old('ingredientes') }}</textarea>

        <label for="preparacion">Preparación:</label>
        <textarea name="preparacion" required>{{ old('preparacion') }}</textarea>

        <button type="submit">Crear Receta</button>
    </form>
@endsection