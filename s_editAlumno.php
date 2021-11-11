<?php
session_start();

require 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM public.alumnos WHERE id = '$id'";
$consulta = pg_query($conexion, $query);
$alumno = pg_fetch_row($consulta);

if (!$consulta) {
    echo "<script type='text/javascript'>alert('Error de coneccion');location='p_gestAlumnos.php';</script>";
}

if (isset($_POST['update'])) {
    $nAl = $_POST['nombreAl'];
    $cAl = $_POST['correoAl'];
    $queryInsert = "UPDATE public.alumnos SET nombre = '$nAl',correo = '$cAl' WHERE id = '$alumno[0]]'";
    pg_query($conexion, $queryInsert);
    echo "<script type='text/javascript'>alert('Actualizacion completa');location='p_gestAlumnos.php';</script>";
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<title>Editar Alumno</title>
<body>
    <div class="container">
        <div class="menu" >
            <nav class="editAlumno">
                <h2>Editar Alumno</h2>
                <form action="s_editAlumno.php?id=<?php echo $alumno[0] ?>" method="post">
                    <input type="test" placeholder="ID" class="id" name="idAl" value="<?php echo $alumno[0]; ?>" readonly="readonly">
                    <input type="text" placeholder="nombre" class="nombre" name="nombreAl" value="<?php echo $alumno[1]; ?>" required>
                    <input type="text" placeholder="correo" class="correo" name="correoAl" value="<?php echo $alumno[2]; ?>" required>
                    <input type="submit" class="submit" value="actualizar" name="update">
                </form>
            </nav>
        </div>
    </div>
</body>