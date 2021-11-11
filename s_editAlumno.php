<?php
session_start();

require 'db.php';

$id = $_GET['id'];
$query = "GET FROM public.alumnos WHERE id = '$id'";
$consulta = pg_query($conexion, $query);
$alumno = pg_fetch_row($consulta);

if (!$consulta) {
    echo "<script type='text/javascript'>alert('Error de coneccion');location='p_gestAlumnos.php';</script>";
}

if(isset($_GET['update'])){
    $queryInsert = "UPDATE FROM public.alumnos (nombre,correo) VALUES ('$nombreal','$correoal') WHERE id = '$idAl'";
        pg_query($queryInsert);
         echo "<script type='text/javascript'>alert('Alumno registrado exitosamente');location='p_gestAlumnos.php';</script>";
}


?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<title>Editar Alumno</title>

<nav class="editAlumno">
    <form action="s_editAlumnos.php?update=<?php echo $alumno[0]; ?>" method="post">
        <input type="test" placeholder="ID" class="id" name="idAl" value="<?php echo $alumno[0]; ?>" readonly="readonly">
        <input type="text" placeholder="nombre" class="nombre" name="nombreAl" value="<?php echo $alumno[1]; ?>" required>
        <input type="text" placeholder="correo" class="correo" name="correoAl" value="<?php echo $alumno[2]; ?>" required>
        <input type="submit" class="submit" value="actualizar" name="update">
        update
    </form>
</nav>