<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/usuario.css">
</head>

<body style="background-image: url(img/fondo.png); background-size: cover; background-attachment: fixed;">
    <div class="contenedor" style="margin-top: 6%;">
        <div class="boton-container" align=center>
            <img src="img/login.png" alt="logo" class="login">
            <form action="/iniciar-sesion" method="post">
                <!-- Campo de correo electrónico -->
                <br><label for="email"><h4><b>Correo Electrónico</b></h4></label><br>
                <input type="email" class="input" id="email" name="email" required><br>

                <!-- Campo de contraseña -->
                <br><label for="password"><h4><b>Contraseña</b></h4></label><br>
                <input type="password" class="input" id="password" name="password" required><br>

                <!-- Botón de envío -->
                <input type="submit" class="boton" value="Iniciar Sesión">
            </form>
            <a href="{{ route('pagina-principal') }}"><button type="button" class="boton">Volver</button></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
