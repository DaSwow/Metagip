<?php
require 'db.php';
session_start();

$correo_prof = $_SESSION['correo_usuario'];


$query ="SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
$consulta = pg_query($conexion, $query);
$cantidad = pg_num_rows($consulta);
$fila = pg_fetch_row($consulta);

if ($cantidad >= 1) {
    echo $fila[0]+$fila[1]+$fila[2];
}else{
    echo "no hay alumnos registrados aun";
}

?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

