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
    <div class="contenedor" style="margin-top: 4%;">
        <div class="boton-container" align=center>
            <img src="img/registro.png" alt="logo" class="login">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Campo de correo electrónico -->
                <br><label for="email">
                    <h4><b>Correo Electrónico</b></h4>
                </label><br>
                <input type="email" class="input" id="email" name="email" required><br>

                @if ($errors->has('email'))
                    <br>
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <!-- Campo de nombre de usuario -->
                <br><label for="name">
                    <h4 style="margin-bottom: 0px"><b>Nombre de Usuario</b></h4>
                </label><br>
                <input type="text" class="input" id="name" name="name" required><br>
                (de 3 a 10 caracteres)

                @if ($errors->has('name'))
                    <br>
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif

                <!-- Campo de contraseña -->
                <br><label for="password" style="margin-top: 10px;">
                    <h4><b>Contraseña</b></h4>
                </label><br>
                <input type="password" class="input" id="password" name="password" required><br>
                (mínimo 8 caracteres)

                <!-- Campo de confirmar contraseña -->
                <br><label for="password-confirm" style="margin-top: 10px;">
                    <h4><b>Confirmar contraseña</b></h4>
                </label><br>
                <input type="password" class="input" id="password-confirm" name="password_confirmation" required><br>

                <br>
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif

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