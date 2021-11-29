<?php

session_start();

require 'db.php';

$clave = $_POST['claveAl'];
$stringClave = '"' . "claveCurso" . '"';
$query = "DELETE FROM public.unidades WHERE $stringClave = '$clave'";
$consulta = pg_query($conexion, $query);

    echo "<script type='text/javascript'>location='p_gestCursos.php';</script>";

?>