<?php

session_start();

require 'db.php';

$clave = $_GET['clave'];
$query = "DELETE FROM public.cursos WHERE clave = '$clave'";
$consulta = pg_query($conexion, $query);

if (!$consulta) {
    echo "<script type='text/javascript'>alert('Datos incorrectos');location='p_gestCursos.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Curso eliminado');location='p_gestCursos.php';</script>";
}
?>