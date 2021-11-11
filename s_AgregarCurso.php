<?php

require 'db.php';
session_start();

$id = $_POST['idAl'];
$nombre_al = $_POST['nombreAl'];
$correo_al = $_POST['correoAl'];
$correo_prof = $_SESSION['correo_usuario'];


if (validateEmail($correo_al)) {
    $query ="SELECT * FROM public.alumnos WHERE id='$id'";
    $consulta = pg_query($conexion, $query);
    $cantidad = pg_num_rows($consulta);
    if ($cantidad === 0) {
        $queryInsert = "INSERT INTO public.alumnos (id,nombre,correo,profesor) VALUES ('$id','$nombre_al','$correo_al','$correo_prof')";
        pg_query($queryInsert);
         echo "<script type='text/javascript'>alert('Alumno registrado exitosamente');location='p_gestAlumnos.php';</script>";
    }else {
        echo "<script type='text/javascript'>alert('Este alumno ya esta registrado.');location='p_gestAlumnos.php';</script>";
    }
} 

//$query ="SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
//$consulta = pg_query($conexion, $query);
//$cantidad = pg_num_rows($consulta);
//$fila = pg_fetch_row($consulta);

//if ($cantidad >= 1) {
  //  echo "<script type='text/javascript'>alert('Alumno $fila[1]');location='p_gestAlumnos.php';</script>";
   // echo $fila[0]+$fila[1]+$fila[2];
//}else{
  //  echo "<script type='text/javascript'>alert('no hay alumnos registrados aun');location='p_gestAlumnos.php';</script>";
    //echo "no hay alumnos registrados aun";
//}
function validateEmail($mail){
    
    //remueve caracteres ilegales en el correo (como los espacios en blanco)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    //valida si $mail tiene formato de correo valido (nombre@host.dominio = ejemplo@mail.com)
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        echo "<script type='text/javascript'>alert('{$mail}: no es un correo valido.');location='p_gestAlumnos.php';</script>";
    }
}
?>
