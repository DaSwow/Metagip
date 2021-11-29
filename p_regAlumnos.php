<?php
include 'db.php';
session_start();
$correo_prof = $_SESSION['correo_usuario'];

$query = "SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
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
                <div class="cursos">
                    <p>Curso:</p>
                    <p><input type="text" placeholder="Curso" class="curso">
                        <select name="nombres">
                            <option value="materia">Metodologia Agiles</option>
                </div>
                <div class="buscador">
                    <input type="text" placeholder="ID" class="idC">
                    <select name="nombre">
                          <?php while ($row = pg_fetch_assoc($consulta)) { ?>
                        <option value="<?php echo $row['nombre'];?>"><?phpecho $row['nombre'];?></option>
                       <!-- <option value="a1">Jesus Edith Carballo Herrera</option>
                        <option value="a2">Hiram Rodriguez</option>-->
                        <?php } ?>
                    </select>
                    <form action="p_regAlumnos.php" method="post">
                        <input type="submit" class="submit" value="Agregar"> 
                    </form>
                </div>
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
                        <form action="p_regAlumnos.php" method="post">
                            <input type="submit" class="submit" value="Guardar">
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