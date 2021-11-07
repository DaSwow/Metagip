<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>UI Login</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div s class="register">
                <h2>Registrarse</h2>
                <form action="registrar.php" method="post">
                    <input type="text" placeholder="Nombre" class="nombre" name="nombre" required>
                    <input type="text" placeholder="Correo" class="correo" name = "correo" required>
                    <input type="password" placeholder="Contraseña" class="pass" name="contrasenia" required>
                    <input type="password" placeholder="Confirma contraseña" class="repass" name="contrasenia2" required>
                    <input type="submit" class="submit" value="Registrarse" name="submit">
                </form>

            </div>
            <div class="login">
                <h2>Iniciar Sesión</h2>
                <form action="login.php" method="post">
                    <input type="text" placeholder="Correo" class="correo" name="logCorreo" required>
                    <input type="password" placeholder="Contraseña" class="pass" name="logContrasenia" required>
                    <br><br><br><br><br><br>
                    <input type="submit" class="submit" value="Iniciar Sesi&oacute;n" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
