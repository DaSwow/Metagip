<?php

include 'db.php';
session_start();
$clave = $_POST['clave'];
$query = "SELECT * FROM public.cursos WHERE clave='$clave';";
$consulta = pg_query($conexion, $query);
$curso = pg_fetch_row($consulta);
$cantidadUnidades = $_POST['cantidadUnidades'];

$stringFechaIni = '"' . "fechaIni" . '"';
$stringFechaFin = '"' . "fechaFin" . '"';
$stringClaveCurso = '"' . "claveCurso" . '"';

for ($i = 1; $i <= $cantidadUnidades; $i++) {


    $fechaIni = $_POST["fechaInicio$i"];
    $fechaFin = $_POST["fechaFin$i"];

    if (!($fechaFin < $fechaIni)) {

        $query = "SELECT * FROM public.unidades WHERE ($stringClaveCurso='$clave') AND (numeroUnidad=$i)";
        $consulta = pg_query($conexion, $query);
        $cantidad = pg_num_rows($consulta);
        if ($cantidad === 0) {
            $queryInsert = "INSERT INTO public.unidades(
	claveCurso, $stringFechaIni, $stringFechaFin , $i)
	VALUES ('$clave', '$fechaIni','$fechaFin',$unidades);";
            pg_query($queryInsert);
            echo "<script type='text/javascript'>alert('Unidades registradas exitosamente');location='p_gestCursos.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Ocurrio un problema inesperado.');location='p_gestUnidades.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('La fecha de fin del curso no puede ser antes que la fecha de inicio.');location='p_gestUnidades.php';</script>";
    }
}
?>


