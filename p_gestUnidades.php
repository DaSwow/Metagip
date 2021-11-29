<?php
include 'db.php';
session_start();
$clave = $_GET['clave'];
$query = "SELECT * FROM public.cursos WHERE clave='$clave';";
$consulta = pg_query($conexion, $query);
$curso = pg_fetch_row($consulta);
$cantidadUnidades = $curso[4];
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Gestionar Alumnos</title>
    <script src="jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="unidad" style="width: 60%;">
            <h2>Unidades</h2>
            <form class="unidad-items" action="s_agregarUnidades.php"  method="POST">
                <table class="colm1" border="1"   >
                    <tr style="width: 300px; ">
                        <td class="fila1"><p>Unidad</p></td>
                        <td class="fila1"><p>Fecha Inicio</p></td>
                        <td class="fila"><p>Fecha Fin</p></td>
                    </tr>
                    <?php for ($i = 1; $i <= $cantidadUnidades; $i++) { ?>
                        <tr style="width: 300px; ">
                            <td><?php echo $i; ?></td>
                            <td><input id="date" name="fechaInicio<?php echo$i ?>" type="date" min="<?php echo $curso[6] ?>" max="<?php echo $curso[7] ?>" style="margin-left: 10%;" required></td>
                            <td><input id="date" name="fechaFin<?php echo$i ?>"    type="date" min="<?php echo $curso[6] ?>" max="<?php echo $curso[7] ?>" style="margin-left: 10%;" required></td>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <input type="hidden" name="cantidadUnidades" value="<?php echo $cantidadUnidades ?>" required>
                <input type="hidden" name="clave" value="<?php echo $clave ?>" required>
                <input type="submit" class="submit" value="Agregar/Actualizar">
            </form>
            <form action="p_gestCursos.php" method="post">
                <input type="submit" class="submit" value="Regresar" />
            </form>
        </div>





    </div> 
    <form action="p_gestCursos.php" method="post">
        <input type="submit" class="submit" value="Regresar">
    </form>
</div>

</body>
</html>