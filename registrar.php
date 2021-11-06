<?php
    require 'db.php';
    session_start();
    $mail=$_POST['correo'];
    $password=$_POST['contrasenia'];
    $name=$_POST['nombre'];

    $query="SELECT * FROM public.usuarios WHERE correo='$mail';";
    $consulta = pg_query($conexion,$query);
    $cantidad = pg_num_rows($consulta);
    echo $cantidad;
    
    if($cantidad === 0){
        $queryInsert="INSERT INTO public.usuarios(correo, contrasenia, nombre) VALUES ('$mail', '$password', '$name');";
        pg_query($queryInsert);
        echo '<script>alert("Cuenta registrada exitosamente")</script>';
        header("location: index.php");
       
       
    }else{
        echo "<script>alert('Este correo ya esta registrado.');</script>";
        header("location: index.php");
        
    }
    
?>