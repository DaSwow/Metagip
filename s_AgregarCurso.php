<?php

require 'db.php';
session_start();

$clave = $_POST['clave'];
$nombreCurso = $_POST['nombreCurso'];
$horaIni = $_POST['horaIni'];
$horaFin = $_POST['horaFin'];
$fechaIni = $_POST['fechaIni'];
$fechaFin = $_POST['fechaFin'];
$unidades = $_POST['unidades'];
$correo_profesor = $_SESSION["correo_usuario"];

$stringHoraIni = '"' . "horaIni" . '"';
$stringHoraFin = '"' . "horaFin" . '"';
$stringFechaIni = '"' . "fechaIni" . '"';
$stringFechaFin = '"' . "fechaFin" . '"';


if ($horaFin < $horaIni) {
    
} else {
    if (! ($fechaFin < $fechaIni)) {
        
        $query = "SELECT * FROM public.cursos WHERE clave='$clave'";
        $consulta = pg_query($conexion, $query);
        $cantidad = pg_num_rows($consulta);
        if ($cantidad === 0) {
            $queryInsert = "INSERT INTO public.cursos(
	clave, nombre, $stringHoraIni, $stringHoraFin,$stringFechaIni, $stringFechaFin ,cursos, profesor)
	VALUES ('$clave', '$nombreCurso',  '$horaIni', '$horaFin', '$fechaIni','$fechaFin',$unidades, '$correo_profesor');";
            pg_query($queryInsert);
            echo "<script type='text/javascript'>alert('Curso registrado exitosamente');location='p_gestCursos.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Este curso ya esta registrado.');location='p_gestCursos.php';</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('La fecha de fin del curso no puede ser antes que la fecha de inicio.');location='p_gestCursos.php';</script>";
    }
}
?>
