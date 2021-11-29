<?php

include 'db.php';
session_start();
$clave = $_GET['idCurso'];
$query = "SELECT * FROM public.cursos WHERE clave='$clave';";
$consulta = pg_query($conexion, $query);
$curso = pg_fetch_row($consulta);
$cantidadUnidades = $_GET('cantidadUnidades');

$stringFechaIni = '"' . "fechaIni" . '"';
$stringFechaFin = '"' . "fechaFin" . '"';

for ($i = 1; $i <= $cantidadUnidades; $i++) {


    $fechaIni = $_POST["fechaInicio$i"];
    $fechaFin = $_POST["fechaFin$i"];

    if (!($fechaFin < $fechaIni)) {

        $query = "SELECT * FROM public.unidades WHERE claveCurso='$clave' AND numeroUnidad=$i";
        $consulta = pg_query($conexion, $query);
        $cantidad = pg_num_rows($consulta);
        if ($cantidad === 0) {
            $queryInsert = "INSERT INTO public.unidades(
	claveCurso, $stringFechaIni, $stringFechaFin , $i)
	VALUES ('$clave', '$fechaIni','$fechaFin',$unidades);";
            pg_query($queryInsert);
            echo "<script type='text/javascript'>alert('Curso registrado exitosamente');location='p_gestCursos.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Este curso ya esta registrado.');location='p_gestUnidades.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('La fecha de fin del curso no puede ser antes que la fecha de inicio.');location='p_gestCursos.php';</script>";
    }
}
?>


