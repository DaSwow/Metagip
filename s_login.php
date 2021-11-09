<?php

require 'db.php';
session_start();
$mail = $_POST['logCorreo'];
$password = $_POST['logContrasenia'];


$query = "SELECT * FROM public.usuarios WHERE correo='$mail' AND contrasenia='$password';";
$consulta = pg_query($conexion, $query);
$cantidad = pg_num_rows($consulta);
$nombre = pg_fetch_row($consulta);
echo $cantidad;

if ($cantidad === 1) {
    $_SESSION['nombre_usuario']=$nombre[2];
    echo "<script type='text/javascript'>alert('Bienvenido $nombre[2]');location='p_menu.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Datos incorrectos');location='index.php';</script>";
}

?>