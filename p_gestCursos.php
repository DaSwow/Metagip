<?php
include 'db.php';
session_start();
$correo_prof = $_SESSION['correo_usuario'];

$query = "SELECT * FROM public.cursos WHERE profesor='$correo_prof'";
$consulta = pg_query($conexion, $query);
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Gestionar Alumnos</title>
    <script src="jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="table-container2">
            <div class="menu" >
                <div id="scroll">
                    <h2>Gestionar Cursos</h2>
                    <nav>
                        <form action="s_AgregarCurso.php" method="POST">
                            <input type="text" placeholder="Clave" class="clave" name="clave" required>
                            <input type="text" placeholder="Nombre" class="nombre" name="nombreCurso" required>
                            <input type="time" id="appt-time"  name="horaIni" required>
                            <input type="time" id="appt-time2"  name="horaFin" required>
                            <input type="number" placeholder="Unidades" class="Unidades" name="unidades" required>
                            <input type="submit" class="submit" value="Agregar">
                        </form> 
                            <br><br><br>

                            <form action="p_menu.php" method="post">
                                <input type="submit" class="submit" value="Regresar">
                            </form>
                    </nav>
                    <table class="colm1"border="1">
                        <tr>
                            <td class="fila1"><p>Clave</p></td>
                            <td class="fila"><p>Nombre</p></td>
                            <td class="fila"><p>Hora-Inicio</p></td>
                            <td class="fila"><p>Hora-Fin</p></td>
                            <td class="fila"><p>Unidades</p></td>
                        </tr>
                        <?php while ($row = pg_fetch_assoc($consulta)) { ?>
                            <tr>
                                <td><?php echo $row['clave']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['horaIni']; ?></td>
                                <td><?php echo $row['horaFin']; ?></td>
                                <td><?php echo $row['cursos']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <br>
                </div>
            </div>
            <div class="unidad">
                <h2>Unidades</h2>
                <div class="unidad-items">
                    <input type="text" placeholder="Inicio" class="inicio">
                    <input type="text" placeholder="Fin" class="fin">
                </div>
            </div>
        </div>
</body>
</html>