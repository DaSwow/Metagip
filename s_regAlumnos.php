<?php
require 'db.php';
session_start();
$clave = $_POST['curso'];
$idAlumno = $_POST['alumno'];

//o
$query = "SELECT * FROM public.rel_cursos_alumnos WHERE claveCurso='$clave' AND idAlumno='$idAlumno';";
$consulta = pg_query($conexion, $query);
$cantidad = pg_num_rows($consulta);
echo $cantidad;
     if ($cantidad === 0) {
        $queryInsert = "INSERT INTO public.rel_cursos_alumnos(claveCurso, idAlumno) VALUES ('$clave', '$idAlumno);";
        pg_query($queryInsert);
        echo "<script type='text/javascript'>alert('Alumn@ registrado al curso exitosamente');location='../p_regAlumnos.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Este alumn@ ya esta registrado');location='../p_regAlumnos.php';</script>";
    }
?>


