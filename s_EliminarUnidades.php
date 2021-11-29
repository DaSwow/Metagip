<?php

session_start();

require 'db.php';

$clave = $_POST['claveAl'];
$stringClave = '"' . "claveCurso" . '"';
$query = "DELETE FROM public.unidades WHERE $stringClave = '$clave'";
$consulta = pg_query($conexion, $query);

if (!$consulta) {
    echo "<script type='text/javascript'>alert('Datos incorrectos');location='p_gestCursos.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Curso eliminado');location='p_gestCursos.php';</script>";
}
?>