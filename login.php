<?php

require 'db.php';
session_start();
$mail = $_POST['logCorreo'];
$password = $_POST['logContrasenia'];


$query = "SELECT * FROM public.usuarios WHERE correo='$mail' AND contrasenia='$password';";
$consulta = pg_query($conexion, $query);
$cantidad = pg_num_rows($consulta);
//$nombre = pg_query("SELECT nombre FROM public.usuarios WHERE correo='$mail';");
$nombre = pg_fetch_array($consulta, 2);
echo $cantidad;

if ($cantidad === 1) {
    echo "<script type='text/javascript'>alert('$nombre');location='index.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Datos incorrectos');location='index.php';</script>";
}

?>