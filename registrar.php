<?php

require 'db.php';
session_start();
$mail = $_POST['correo'];
$password = $_POST['contrasenia'];
$password2 = $_POST['contrasenia2'];
$name = $_POST['nombre'];

if ($password === $password2 and validateEmail($mail)) {
    $query = "SELECT * FROM public.usuarios WHERE correo='$mail';";
    $consulta = pg_query($conexion, $query);
    $cantidad = pg_num_rows($consulta);
    echo $cantidad;

    if ($cantidad === 0) {
        $queryInsert = "INSERT INTO public.usuarios(correo, contrasenia, nombre) VALUES ('$mail', '$password', '$name');";
        pg_query($queryInsert);
        echo "<script type='text/javascript'>alert('Cuenta registrada exitosamente');location='../index.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Este correo ya esta registrado.');location='../index.php';</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Las contraseñas no son iguales, favor de verificar.');location='../index.php';</script>";
}

function validateEmail($mail){
    
    //remueve caracteres ilegales en el correo (como los espacios en blanco)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    //valida si $mail tiene formato de correo valido (nombre@host.dominio = ejemplo@mail.com)
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        echo "<script type='text/javascript'>alert('{$mail}: no es un correo valido.');location='../index.php';</script>";
    }
}
?>