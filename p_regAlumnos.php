<?php
include 'db.php';
session_start();
$correo_prof = $_SESSION['correo_usuario'];

$query = "SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
$queryCurso = "SELECT * FROM public.cursos WHERE profesor='$correo_prof'";
$consultaCurso = pg_query($conexion, $queryCurso);
$consulta = pg_query($conexion, $query);
?>
<!DOCTYPE html>
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
                        <select name="curso">
                             <?php  while ($rowCurso = pg_fetch_assoc($consultaCurso)) { ?>
                            <option value="<?php echo $rowCurso['clave']; ?>"><?php echo $rowCurso['nombre']; ?></option>
                              <?php } ?>
                        </select>
                    </div>
                    <div class="buscador">
                        <input type="text" placeholder="ID" class="idC">
                        <select name="alumno">
                            <?php  while ($row = pg_fetch_assoc($consulta)) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        <!--<option value="a1">Jesus Edith Carballo Herrera</option>
                        <option value="a2">Hiram Rodriguez</option>-->
                        </select>
                    
                    </div>
                        <input type="submit" class="submit" value="Agregar"> 
                </form>
                 <form action="p_regAlumnos.php?<?phpecho $row['id'];?>" method="post">
                            <input type="submit" class="submit" value="Desplegar Lista">
                </form>
                <div id="scroll2">
                    <table class="table2"border="1">
                        <tr>
                            <td class="fila1"><p>ID</p></td>
                            <td class="fila"><p>Alumno</p></td>
                        </tr>
                        <tr>
                            <td class="fila2"><p>00000189362</p></td>
                            <td class="fila2"><p>Jesus Edith Carballo Herrera</p></td>
                            <td class="fila2">
                                <input type="checkbox" id="cbox" value="first">
                            </td>
                        </tr>
                    </table>
                    <nav id="btn">
                        <form action="p_regAlumnos.php" method="post">
                            <input type="submit" class="submit" value="Eliminar">
                        </form>
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