<?php
require 'db.php';
session_start();

$clave = $_POST['clave'];
$nombreCurso = $_POST['nombreCurso'];
$horaIni = $_POST['horaIni'];
$horaFin = $_POST['horaFin'];
$unidades = $_POST['unidades'];

if ($horaFin < $horaIni) {
    echo "<script type='text/javascript'>alert('La hora de fin del curso no puede ser antes que la hora de inicio.');location='p_gestCursos.php';</script>";
} else {
    
}
?>
