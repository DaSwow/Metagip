<?php

session_start();

require 'db.php';

if (confirm('Seguro que quieres eliminarlo?')) {

} else {
  echo "<script type='text/javascript'>alert('Cancelado');location='p_gestAlumnos.php';</script>";
}

$id = $_GET['id'];
$query = "DELETE FROM public.alumnos WHERE id = '$id'";
$consulta = pg_query($conexion, $query);

if (!$consulta) {
    echo "<script type='text/javascript'>alert('Datos incorrectos');location='p_gestAlumnos.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Alumno eliminado');location='p_gestAlumnos.php';</script>";
}
?>