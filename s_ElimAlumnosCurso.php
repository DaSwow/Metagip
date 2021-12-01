<?php
require 'db.php';
session_start();
$clave = $_POST['clave'];
$idAlumno = $_POST['alumno'];
$stringClaveCurso = '"' . "claveCurso" . '"';
$stringIdAlumno = '"' . "idAlumno" . '"';

$query = "DELETE FROM public.rel_cursos_alumnos WHERE ($stringClaveCurso='$clave') AND ($stringIdAlumno='$idAlumno');";
$consulta = pg_query($conexion, $query);


if (!$consulta) {
    echo "<script type='text/javascript'>alert('Datos incorrectos');location='p_regAlumnos.php?curso=$clave';</script>";
} else {
    echo "<script type='text/javascript'>alert('Alumno eliminado del curso');location='p_regAlumnos.php?curso=$clave';</script>";
}
?>