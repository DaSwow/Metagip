<?php
require 'db.php';
session_start();
$clave = $_GET['clave'];
$query = "SELECT * FROM public.cursos WHERE clave='$clave';";
$consulta = pg_query($conexion, $query);
$curso = pg_fetch_row($consulta);
$cantidadUnidades = $curso[4];
$i = 0;

$fechaIni = $_GET['fechaIni'+$i];
$fechaFin =$_GET['fechaFin'+$i];

echo "<script type='text/javascript'>alert('Divisiones registradas exitosamente $fechaFin ,$fechaIni');location='p_gestUnidades.php';</script>";

//for ($i = 0; $i < $cantidadUnidades; $i++) {
  //  $fechaIni = $_GET['fechaIni'%i];
  //  $fechaFin = $_GET['fechaFin'%i];
    //$queryInsert = "INSERT INTO public.unidades (claveCurso,fechaIni,fechaFin,numeroUnidad VALUES ('$clave','$fechaIni','$fechaFin','$i');";
    //pg_query($queryInsert);
//}
//echo "<script type='text/javascript'>alert('Divisiones registradas exitosamente');location='p_gestUnidades.php';</script>";

?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

