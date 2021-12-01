<?php
include 'db.php';
session_start();
$correo_prof = $_SESSION['correo_usuario'];


$query = "SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
$queryCurso = "SELECT * FROM public.cursos WHERE profesor='$correo_prof'";
$consultaCurso = pg_query($conexion, $queryCurso);
$consultaAlumno = pg_query($conexion, $query);


$stringClaveCurso = '"' . "claveCurso" . '"';
$stringIdAlumno = '"' . "idAlumno" . '"';
$stringId = '"' . "id" . '"';
$stringNombre = '"' . "nombre" . '"';

if (isset($_GET['curso'])) {
    $clave = $_GET['curso'];
    $queryAlumnos = "SELECT $stringId,$stringNombre FROM public.alumnos INNER JOIN (SELECT * FROM public.rel_cursos_alumnos where $stringClaveCurso='$clave') AS curso ON (alumnos.id = $stringIdAlumno);";
    $consultaAlumnosEnCurso = pg_query($conexion, $queryAlumnos);
    $alumnosEnCurso = pg_fetch_all($consultaAlumnosEnCurso);
    $cantidadAlumnosEnCurso = count($alumnosEnCurso);
}
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
    <title>Registrar Alumnos</title>
    <body>
        <div class="container">
            <div class="table-container3">
                <div class="menu">
                    <h2>Registrar Alumnos</h2>
                    <form action="s_regAlumnos.php" method="post">
                        <div class="cursos">
                            <p>Curso:</p>
                            <p><input type="text" placeholder="Curso" class="curso">
                                <select name="curso" required>
                                    <?php while ($rowCurso = pg_fetch_assoc($consultaCurso)) { ?>
                                        <option value="<?php echo $rowCurso['clave']; ?>"><?php echo $rowCurso['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                                <br><br>
                        </div>
                        <div class="buscador">
                            <input type="text" placeholder="ID" class="idC">
                            <select name="alumno">
                                <?php while ($row = pg_fetch_assoc($consultaAlumno)) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <br><br>
                        </div>
                        <input type="submit" class="submit"  name="botonAccion"   value="agregar"> 
                        <input type="submit" class="submit"  name="botonAccion"   value="desplegar">
                    </form>

                    <div id="scroll2">
                        <table class="table2 "border="1">
                            <tr>
                                <td class="fila1"><p>ID</p></td>
                                <td class="fila"><p>Alumno</p></td>
                            </tr>
                            <?php if (!empty($alumnosEnCurso)) { ?>
                                <?php for ($row = 0; $row < $cantidadAlumnosEnCurso; $row++) { ?>
                                    <tr>
                                        <td class="fila2"><p><?php echo $alumnosEnCurso[$row]['id']; ?></p></td>
                                        <td class="fila2"><p><?php echo $alumnosEnCurso[$row]['nombre']; ?></p></td>
                                        <td class="fila2">
                                            <form action="s_ElimAlumnosCurso.php" method="post">
                                                <input type="hidden" name="clave"  value="<?php echo $clave;?>"value="<?php echo $alumnosEnCurso[$row]['id'];?>">
                                                <input type="hidden" name="alumno" value="<?php echo $alumnosEnCurso[$row]['id'];?>"">
                                                <input type="submit" class="optns" value="Borrar" onclick="return confirm('¿Seguro que desea eliminar el alumno del curso?');" style="width: 60px;"/>
                                            </form></td>
                                    </tr>
                                <?php }
                            } ?>
                        </table>
                        <nav id="btn">
                            <form action="p_menu.php" method="post">
                                <input type="submit" class="submit" value="Regresar">
                            </form>
                        </nav> 

                    </div>

                </div>

            </div>
        </div>
    </body>
</html>