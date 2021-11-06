<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UI Login</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div action="registrar.php" class="register">
                <h2>Registrarse</h2>
                <form action="">
                    <input type="text" placeholder="Nombre" class="nombre" name="nombre" required>
                    <input type="text" placeholder="Correo" class="correo" name = "correo" required>
                    <input type="password" placeholder="Contraseña" class="pass" name="contrasenia" required>
                    <input type="password" placeholder="Confirma contraseña" class="repass" required>
                    <input type="submit" class="submit" value="REGISTRARSE">
                </form>

            </div>
            <div class="login">
                <h2>Iniciar Sesión</h2>
                <div class="login-items">
                    <input type="text" placeholder="Correo" class="correo" name="logCorreo" required>
                    <input type="password" placeholder="Contraseña" class="pass" name="logContrasenia" required>
                    <input type="submit" class="submit" value="REGISTRARSE">
                </div>
            </div>

        </div>
    </div>
</body>
</html>
