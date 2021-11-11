<?php

require 'db.php';
session_start();

$clave = $_POST['clave'];
$nombreCurso = $_POST['nombreCurso'];
$horaIni = $_POST['horaIni'];
$horaFin = $_POST['horaIni'];
$unidades = $_POST['horaFin'];

if ($horaFin < $horaIni) {
    echo "<script type='text/javascript'>alert('La hora de fin del curso no puede ser antes que la hora de inicio.');location='p_gestCursos.php';</script>";
} else {

    if (validateEmail($correo_al)) {
        $query = "SELECT * FROM public.alumnos WHERE id='$id'";
        $consulta = pg_query($conexion, $query);
        $cantidad = pg_num_rows($consulta);
        if ($cantidad === 0) {
            $queryInsert = "INSERT INTO public.alumnos (id,nombre,correo,profesor) VALUES ('$id','$nombre_al','$correo_al','$correo_prof')";
            pg_query($queryInsert);
            echo "<script type='text/javascript'>alert('Alumno registrado exitosamente');location='p_gestAlumnos.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Este alumno ya esta registrado.');location='p_gestAlumnos.php';</script>";
        }
    }
}
?>
