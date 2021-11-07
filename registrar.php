<?php

require 'db.php';
session_start();
$mail = $_POST['correo'];
$password = $_POST['contrasenia'];
$password2 = $_POST['contrasenia2'];
$name = $_POST['nombre'];

if ($password === $password2) {
    $query = "SELECT * FROM public.usuarios WHERE correo='$mail';";
    $consulta = pg_query($conexion, $query);
    $cantidad = pg_num_rows($consulta);
    echo $cantidad;

    if ($cantidad === 0) {
        $queryInsert = "INSERT INTO public.usuarios(correo, contrasenia, nombre) VALUES ('$mail', '$password', '$name');";
        pg_query($queryInsert);
        echo "<script>alert('Cuenta registrada exitosamente')</script>";
        header("location: index.php");
    } else {
        echo "<script type='text/javascript'>alert('Este correo ya esta registrado.');location='index.php';</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Las contraseñas no son iguales, favor de verificar.');location='index.php';</script>";
}
?>