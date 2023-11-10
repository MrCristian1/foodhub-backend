@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="css/detalles.css">
@endsection

@section('detail')
<div class="contenedor">
    <div class="row post">
        <img src="img/hamburguesa.png" class="img-receta">
        <div class="col-md-7">
            @role('administrador')
            <!--Este es el botón para borrar la publicación, lo cual solo puede hacer un admin, falta el css el cual modificaré yo después, y esa función puesta en el onclick no existe, ahi se pone lo que seria la función ya programada de que se borre el post-->
            <button class="cerrar-contenedor" onclick="borrarPost(this)">Eliminar Post</button>
            @endrole
            <h1>Nombre Receta</h1>
            <p style="text-align: justify;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro sint expedita officiis sit doloremque maiores adipisci culpa qui impedit ea officia harum quos, sapiente nulla. Nobis odio eius sed dolore!</p>
            <b>Etiquetas:</b> Etiquetas<br><br>
            <button type="button" class="boton">Añadir a favoritos</button>
        </div>
    </div>
    <div class="post">
        <h2>Ingredientes</h2>
        <p style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat, qui aliquid! Excepturi eos veritatis possimus impedit architecto ut quos, ad facere amet nam incidunt repellendus alias ea earum quis vero?</p>
        <h2>Procedimiento</h2>
        <p style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat, qui aliquid! Excepturi eos veritatis possimus impedit architecto ut quos, ad facere amet nam incidunt repellendus alias ea earum quis vero?</p>

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