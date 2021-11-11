<?php
require 'db.php';
session_start();

$clave = $_POST['clave'];
$nombreCurso = $_POST['nombreCurso'];
$horaIni = $_POST['horaIni'];
$horaFin = $_POST['horaFin'];
$unidades = $_POST['unidades'];
$correo_profesor = $_SESSION["correo_usuario"];




if ($horaFin < $horaIni) {
    echo "<script type='text/javascript'>alert('La hora de fin del curso no puede ser antes que la hora de inicio.');location='p_gestCursos.php';</script>";
} else {
    $query ="SELECT * FROM public.cursos WHERE clave='$clave'";
    $consulta = pg_query($conexion, $query);
    $cantidad = pg_num_rows($consulta);
    if ($cantidad === 0) {
        $queryInsert = "INSERT INTO public.cursos(
	clave, nombre, 'horaIni', 'horaFin', cursos, profesor)
	VALUES ('$clave', '$nombreCurso',  "
                . "'$horaIni', '$horaFin', "
                . "$unidades, '$correo_profesor');";
        pg_query($queryInsert);
         echo "<script type='text/javascript'>alert('Curso registrado exitosamente');location='p_gestCursos.php';</script>";
    }else {
        echo "<script type='text/javascript'>alert('Este curso ya esta registrado.');location='p_gestCursos.php';</script>";
    }
}

?>
