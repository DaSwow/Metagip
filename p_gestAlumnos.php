<?php
include 'db.php';
session_start();
$correo_prof = $_SESSION['correo_usuario'];

$query ="SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
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
                        <?php while ($row = $consulta->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['nombre'];?></td>
                            <td><?php echo $row['correo'];?></td>
                            <!--<td class="fila2"><p>00000189362</p></td>
                            <td class="fila2"><p>Edith </p></td>
                            <td class="fila2"><p>asdasdas@gmail.com</p></td>-->
                        </tr>
                        <?php }?>
                    </table>
                    <nav>
                        <form action="">
                            <input type="submit" class="submit" value="Editar">
                            <input type="submit" class="submit" value="Elimar">
                            <input type="submit" class="submit" value="Agregar">
                            <input type="submit" class="submit" value="Regresar">
                        </form> 
                    </nav> 

                </div>

            </div>

        </div>
    </div>
</body>
</html>