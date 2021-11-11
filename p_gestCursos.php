<?php
include 'db.php';
session_start();
$correo_prof = $_SESSION['correo_usuario'];

$query = "SELECT * FROM public.alumnos WHERE profesor='$correo_prof'";
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
                            <input type="text" placeholder="clave" class="clave" name="clave" required>
                            <input type="text" placeholder="nombre" class="nombre" name="nombreCurso" required>
                            <input type="time" id="appt-time"  name="hora-ini" required>
                            <input type="time" id="appt-time"  name="hora-fin" required>
                            <input type="submit" class="submit" value="Agregar">
                        </form> 
                            <br><br><br>
                            <input type="submit" class="submit" value="Editar"> 
                            <input type="submit" class="submit" value="Eliminar">
                            <input type="submit" class="submit" value="Regresar"> >
                    </nav>
                    <table class="colm1"border="1">
                        <tr>
                            <td class="fila1"><p>Clave</p></td>
                            <td class="fila"><p>Nombre</p></td>
                            <td class="fila"><p>Hora-Inicio</p></td>
                            <td class="fila"><p>Hora-Fin</p></td>
                            <td class="fila"><p>Unidades</p></td>
                        </tr>
                        <tr>
                            <td class="fila2"><p>00000189362</p></td>
                            <td class="fila2"><p>Edith </p></td>
                            <td class="fila2"><p>8:00</p></td>
                            <td class="fila2"><p>9:30</p></td>
                            <td class="fila2"><p>6</p></td>
                        </tr>
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