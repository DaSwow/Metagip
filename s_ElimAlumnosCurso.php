<?php
require 'db.php';
session_start();
//$clave = $_POST['curso'];
//$idAlumno = $_POST['alumno'];
$stringClaveCurso = '"' . "claveCurso" . '"';
$stringIdAlumno = '"' . "idAlumno" . '"';
//
//$query = "DELETE FROM public.rel_cursos_alumnos WHERE ($stringClaveCurso='$clave') AND ($stringIdAlumno='$idAlumno');";
$consulta = pg_query($conexion, $query);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

