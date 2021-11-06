<?php
    header("Location: indexFake.php");

/*
    require 'db.php';
    echo '<script>alert("aqui toy")</script>';
    session_start();
    $mail=$_POST['correo'];
    $password=$_POST['contrasenia'];
    $name=$_POST['nombre'];

    $query="SELECT * FROM public.usuarios WHERE correo='$mail' ";
    $consulta= pg_query($db,$query);
    $cantidad= pg_num_rows($consulta);
    if(cantidad>0){
        $query="INSERT INTO public.usuarios(correo, contrasenia, nombre)VALUES ($mail, $password, $name);";
        echo "Cuenta registrada exitosamente";
        header("location: index.php");
    }else{
            echo "Este correo ya esta registrado.";
    }
 * 
 */
?>