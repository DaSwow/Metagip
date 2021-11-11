<?php
session_start();

require 'db.php';

$clave = $_GET['clave'];
$query = "SELECT * FROM public.cursos WHERE clave = '$clave'";
$consulta = pg_query($conexion, $query);
$curso = pg_fetch_row($consulta);

if (!$consulta) {
    echo "<script type='text/javascript'>alert('Error de conexión.');location='p_gestCursos.php';</script>";
}

if (isset($_POST['update'])) {
    $nAl = $_POST['nombreAl'];
    $cAl = $_POST['correoAl'];
    $queryInsert = "UPDATE public.alumnos SET nombre = '$nAl',correo = '$cAl' WHERE id = '$alumno[0]'";
    pg_query($conexion, $queryInsert);
    echo "<script type='text/javascript'>alert('Actualizacion completa');location='p_gestCursos.php';</script>";
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
                <form action="s_editCurso.php?clave=<?php echo $curso[0] ?>" method="post">
                            <input type="text" placeholder="Clave" class="clave" name="clave"  readonly="readonly">
                            <input type="text" placeholder="Nombre" class="nombre" name="nombreCurso"  value="<?php echo $alumno[1]; ?>" required>
                            <input type="time" id="appt-time"  name="horaIni" value="<?php echo $alumno[2]; ?>" required>
                            <input type="time" id="appt-time2"  name="horaFin" value="<?php echo $alumno[3]; ?>" required>
                            <input type="date" id="fechaIni" name="fechaIni"  value="<?php echo $alumno[4]; ?>" required>
                            <input type="date" id="fechaFin"  name="fechaFin" value="<?php echo $alumno[5]; ?>" required>
                            <input type="number" placeholder="Unidades" class="Unidades" name="unidades" min="0" max="8" value="<?php echo $alumno[6]; ?>" required >
                            <input type="submit" class="submit" value="Agregar" name="update">
                </form>
            </nav>
        </div>
    </div>
</body>