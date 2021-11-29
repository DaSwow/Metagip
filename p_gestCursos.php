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
                <div id="scroll" style="margin-right:  30px;">
                    <h2>Gestionar Cursos</h2>
                    <nav>
                        <form action="s_AgregarCurso.php" method="POST">
                            <input type="text" placeholder="Clave" class="clave" name="clave" required>
                            <input type="text" placeholder="Nombre" class="nombre" name="nombreCurso" required>
                            <input type="time" id="appt-time"  name="horaIni" required>
                            <input type="time" id="appt-time2"  name="horaFin" required>
                            <input type="date" id="fechaIni" name="fechaIni"  required>
                            <input type="date" id="fechaFin"  name="fechaFin" required>
                            <input type="number" placeholder="Unidades" class="Unidades" name="unidades" min="0" max="8" required>
                            <input type="submit" class="submit" value="Agregar">
                        </form> 
                            <br><br><br>

                            <form action="p_menu.php" method="post">
                                <input type="submit" class="submit" value="Regresar">
                            </form>
                    </nav>
                    <table class="colm1" border="1">
                        <tr>
                            <td class="fila1"><p>Clave</p></td>
                            <td class="fila"><p>Nombre</p></td>
                            <td class="fila"><p>Hora-Inicio</p></td>
                            <td class="fila"><p>Hora-Fin</p></td>
                            <td class="fila"><p>Fecha-Inicio</p></td>
                            <td class="fila"><p>Fecha-Fin</p></td>
                            <td class="fila"><p>Unidades</p></td>
                        </tr>
                        <?php while ($row = pg_fetch_assoc($consulta)) { ?>
                            <tr>
                                <td><?php echo $row['clave']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['horaIni']; ?></td>
                                <td><?php echo $row['horaFin']; ?></td>
                                <td><?php echo $row['fechaIni']; ?></td>
                                <td><?php echo $row['fechaFin']; ?></td>
                                <td><?php echo $row['unidades']; ?></td>
                                
                                <td>
                                    <form action="s_editCurso.php?clave=<?php echo $row['clave'] ?>" method="post">
                                        <input type="submit" class="optns" value="Editar" onclick="return confirm('¿Desea editar al curso?');" style="margin-left: 0%;"/>
                                    </form>
                                </td>
                                <td>
                                    <form action="s_elimCurso.php?clave=<?php echo $row['clave'] ?>" method="post">
                                        <input type="submit" class="optns" value="Borrar" onclick="return confirm('¿Seguro que desea eliminar el curso?');"style="margin-left: 0%;"/>
                                    </form>
                                </td>
                                <td>
                                    <form action="p_gestUnidades.php?clave=<?php echo $row['clave'] ?>" method="post" style="margin-left: 0%;">
                                        <input type="submit" class="optns" value="Unidades"/>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>