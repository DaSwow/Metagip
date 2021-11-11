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
    $claveAl = $_POST['claveAl'];
    $nombreAl = $_POST['nombreAl'];
    $horaIniAl = $_POST['horaIniAl'];
    $horaFinAl = $_POST['horaFinAl'];
    $fechaIniAl = $_POST['fechaIniAl'];
    $fechaFinAl = $_POST['fechaFinAl'];
    $unidadesAl = $_POST['unidadesAl'];

    $stringHoraIni = '"'."horaIni".'"';
    $stringHoraFin = '"'."horaFin".'"';
    $stringFechaIni = '"'."fechaIni".'"';
    $stringFechaFin = '"'."fechaFin".'"';

    if ($horaFinAl < $horaIniAl) {
        echo "<script type='text/javascript'>alert('La hora de fin del curso no puede ser antes que la hora de inicio.');location='p_gestCursos.php';</script>";
    } else {
        if (!($fechaFinAl < $fechaIniAl)) {
                $queryInsert = "UPDATE public.cursos SET nombre = '$nombreAl', $stringHoraIni=$horaIniAl, $stringHoraFin=$horaFinAl, $stringFechaIni=$fechaIniAl, $stringFechaFin=$fechaFinAl, unidades=$unidadesAl WHERE clave = '$claveAl'";
                pg_query($conexion, $queryInsert);
                echo "<script type='text/javascript'>alert('Actualizacion completa');location='p_gestCursos.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('La fecha de fin del curso no puede ser antes que la fecha de inicio.');location='p_gestCursos.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<title>Editar Alumno</title>
<body>
    <div class="container" >
        <div class="menu" style="margin-right:  100%; margin-bottom: 50%;" >
            <nav class="editAlumno" >
                <h2>Editar Alumno</h2>
                <form action="s_editCurso.php?clave=<?php echo $curso[0] ?>" method="post">
                    <input type="text" placeholder="Clave" class="clave" name="claveAl"  value="<?php echo $curso[0]; ?>" readonly="readonly">
                    <input type="text" placeholder="Nombre" class="nombre" name="nombreAl"  value="<?php echo $curso[1]; ?>" required>
                    <input type="time" id="appt-time"  name="horaIniAl" value="<?php echo $curso[2]; ?>" required>
                    <input type="time" id="appt-time2"  name="horaFinAl" value="<?php echo $curso[3]; ?>" required>
                    <input type="date" id="fechaIni" name="fechaIniAl"  value="<?php echo $curso[6]; ?>" required>
                    <input type="date" id="fechaFin"  name="fechaFinAl" value="<?php echo $curso[7]; ?>" required>
                    <input type="number" placeholder="Unidades" class="unidades" name="unidadesAl" min="0" max="8" value="<?php echo $curso[4]; ?>" required >
                    <input type="submit" class="submit" value="Editar" name="update">
                </form>
            </nav>
        </div>
    </div>
</body>