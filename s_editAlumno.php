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

function updateAlm(){
    $queryInsert = "UPDATE FROM public.alumnos (nombre,correo) VALUES ('$alumno[1]]','$alumno[2]]') WHERE id = '$alumno[0]]'";
    pg_query($queryInsert);
    echo "<script type='text/javascript'>alert('Alumno registrado exitosamente');location='p_gestAlumnos.php';</script>";
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<title>Editar Alumno</title>
<body>
    <div class="container">
        <div class="table-container2">
            <div class="menu" >
                <div id="scroll">
                    <div id="scroll">
                        <nav class="editAlumno">
                            <form method="post">
                                <input type="test" placeholder="ID" class="id" name="idAl" value="<?php echo $alumno[0]; ?>" readonly="readonly">
                                <input type="text" placeholder="nombre" class="nombre" name="nombreAl" value="<?php echo $alumno[1]; ?>" required>
                                <input type="text" placeholder="correo" class="correo" name="correoAl" value="<?php echo $alumno[2]; ?>" required>
                                <input type="submit" class="submit" value="actualizar" name="update" onclick="updateAlm()">
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>