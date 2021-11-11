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
        <div class="unidad" >
            <h2>Unidades</h2>
            <div class="unidad-items">
                <form action="s_gestUnidades.php?clave=<?php echo $clave?>" method="post">
                <table class="colm1" border="1">
                    <tr>
                        <td class="fila1"><p>Unidad</p></td>
                        <td class="fila1"><p>Fecha Inicio</p></td>
                        <td class="fila"><p>Fecha Fin</p></td>
                    </tr>
                    <?php for ($i = 0; $i < $cantidadUnidades; $i++) { ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><input type="date" id="fechaIni" name="fechaIni<?php echo $i;?>"  required></td>
                            <td><input type="date" id="fechaFin"  name="fechaFin<?php echo $i;?>" required></td>
                           <!-- <td><php echo "fechaIni"; ?></td>
                            <td><php echo "fechaFin"; ?></td>-->
                        </tr>
                    <?php } ?>
                </table>
                    <input type="submit" class="submit" value="Actualizar">
                </form>
            </div>
        </div> 
        <form action="p_gestCursos.php" method="post">
            <input type="submit" class="submit" value="Regresar">
        </form>
    </div>

</body>
</html>