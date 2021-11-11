<?php
include 'db.php';
session_start();
$correo_prof = $_SESSION['correo_usuario'];

$query = "SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
$consulta = pg_query($conexion, $query);
?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<title>Gestionar Alumnos</title>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <div class="menu">
                <h2>Gestionar Alumno</h2>
                <div id="scroll">
                    <table class="colm1"border="1">
                        <tr>
                            <td class="fila1"><p>ID</p></td>
                            <td class="fila"><p>Nombre</p></td>
                            <td class="fila"><p>Email</p></td>
                        </tr>
                        <?php while ($row = pg_fetch_assoc($consulta)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['correo']; ?></td>
                                <td><input type="submit" class="optns" value="Editar"></td>
                                <td><input type="submit" class="optns" value="Elimar"></td>
                            <!--<td class="fila2"><p>00000189362</p></td>
                            <td class="fila2"><p>Edith </p></td>
                            <td class="fila2"><p>asdasdas@gmail.com</p></td>-->
                            </tr>
                        <?php } ?>
                    </table>
                    <nav>
                        <form action="s_gestAlumnos.php" method="post" class="agregarAlumno">
                            <input type="test" placeholder="ID" class="id" name="idAl" pattern="[0-9]+" required>
                            <input type="text" placeholder="nombre" class="nombre" name="nombreAl" required>
                            <input type="text" placeholder="correo" class="correo" name="correoAl" required>
                          <!--  <input type="submit" class="submit" value="Editar">
                            <input type="submit" class="submit" value="Elimar">-->
                            <input type="submit" class="submit" value="Agregar"><br><br><br><br><br>
                            <input type="submit" class="submit" value="Regresar">
                        </form> 
                    </nav> 

                </div>

            </div>

        </div>
    </div>
</body>
</html>