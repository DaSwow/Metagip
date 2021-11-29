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
                    <input type="text" placeholder="Curso" class="curso">
                    <select name="nombres" id="nombresAlumnos">
                        <option value="materia">Metodologia Agiles</option>
                </div>
                <div class="buscador">
                    <input type="text" placeholder="ID" class="idC">
                    <select name="nombre" id="nombresA">
                        <option value="a1">Jesus Edith Carballo Herrera</option>
                        <option value="a2">Hiram Rodriguez</option>
                        <input type="submit" class="submit" value="Agregar"> 
                        </div>
                        <div id="scroll2">

                            <table class="table2"border="1">
                                <tr>
                                    <td class="filaID"><p>ID</p></td>
                                    <td class="filaAl"><p>Alumno</p></td>
                                    <td class="filaF"><p> </p></td>
                                </tr>
                                <tr>
                                    <td class="fila2ID"><p>00000189362</p></td>
                                    <td class="fila2A"><p>Jesus Edith Carballo Herrera</p></td>
                                    <td class="fila2">
                                        <input type="checkbox" id="cbox" value="first">
                                    </td>
                                </tr>
                            </table>
                            <nav id="btn">
                                <form action="">

                                    <input type="submit" class="submit" value="Eliminar">
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