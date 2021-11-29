<?php

include 'db.php';
session_start();
$clave = $_POST['clave'];
$query = "SELECT * FROM public.cursos WHERE clave='$clave';";
$consulta = pg_query($conexion, $query);
$curso = pg_fetch_row($consulta);
$cantidadUnidades = $_POST['cantidadUnidades'];

$stringClaveCurso = '"' . "claveCurso" . '"';
$stringFechaIni = '"' . "fechaIni" . '"';
$stringFechaFin = '"' . "fechaFin" . '"';
$stringNumeroUnidad = '"' . "numeroUnidad" . '"';



for ($i = 1; $i <= $cantidadUnidades; $i++) {


    $fechaIni = $_POST["fechaInicio" . $i];
    $fechaFin = $_POST["fechaFin" . $i];

    if (!($fechaFin < $fechaIni)) {

        $query = "SELECT * FROM public.unidades WHERE ($stringClaveCurso='$clave') AND ($stringNumeroUnidad=$i)";
        $consulta = pg_query($conexion, $query);
        $cantidad = pg_num_rows($consulta);
        if ($cantidad === 0) {
            $queryInsert = "INSERT INTO public.unidades(
	$stringClaveCurso, $stringFechaIni, $stringFechaFin , $stringNumeroUnidad)
	VALUES ('$clave', '$fechaIni','$fechaFin',$i);";
            pg_query($queryInsert);
            echo "<script type='text/javascript'>alert('Unidades registradas exitosamente');location='p_gestCursos.php';</script>";
        } else {
            $queryInsert = "UPDATE public.unidades SET
	$stringClaveCurso='$clave', $stringFechaIni='$fechaIni', $stringFechaFin='$fechaFin' , $stringNumeroUnidad=$i WHERE ($stringClaveCurso='$clave') AND ($stringNumeroUnidad=$i)";
            pg_query($queryInsert);
            echo "<script type='text/javascript'>alert('Ocurrio un problema inesperado.');location='p_gestCursos.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('La fecha de fin del curso no puede ser antes que la fecha de inicio.');location='p_gestUnidades.php';</script>";
    }
}
?>


