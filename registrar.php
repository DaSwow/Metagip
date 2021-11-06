<?php
    require 'db.php';
    session_start();
    $correo=$_POST['mail'];
    $contrasenia=$_POST['password'];
    $nombre=$_POST['name'];

    $query="SELECT * FROM public.usuarios WHERE correo='$correo' ";
    $consulta= pg_query($conexion,$query);
    $cantidad= pg_num_rows($consulta);
    if(cantidad>0){
        $query="INSERT INTO public.usuarios(correo, contrasenia, nombre)VALUES ($correo, $contrasenia, $nombre);";
        header("location: index.php");
    }else{
            echo "Este correo ya esta registrado.";
    }
