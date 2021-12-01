<?php

require 'db.php';
session_start();
$clave = $_POST['curso'];
$idAlumno = $_POST['alumno'];
$stringClaveCurso = '"' . "claveCurso" . '"';
$stringIdAlumno = '"' . "idAlumno" . '"';
$stringId = '"' . "id" . '"';
$stringNombre = '"' . "nombre" . '"';
$accion = $_POST['botonAccion'];
if ($accion === "agregar") {
    //
    $query = "SELECT * FROM public.rel_cursos_alumnos WHERE ($stringClaveCurso='$clave') AND ($stringIdAlumno='$idAlumno');";
    $consulta = pg_query($conexion, $query);
    $cantidad = pg_num_rows($consulta);

    echo $cantidad;
    if ($cantidad === 0) {

        $queryInsert = "INSERT INTO public.rel_cursos_alumnos($stringClaveCurso, $stringIdAlumno) VALUES ('$clave','$idAlumno');";
        pg_query($queryInsert);
        echo "<script type='text/javascript'>alert('Alumn@ registrado al curso exitosamente');location='../p_regAlumnos.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Este alumn@ ya esta registrado');location='../p_regAlumnos.php';</script>";
    }
} else if ($accion === "desplegar") {
    echo "<script type='text/javascript'>location='../p_regAlumnos.php?curso=$clave';</script>";
}
?>
