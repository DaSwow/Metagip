<?php
include 'db.php';
session_start();
$clave=$_GET['clave'];
$query = "SELECT * FROM public.cursos WHERE clave='$clave';";
$consulta = pg_query($conexion, $query);
$cantidad = $consulta[4];











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
                <table class="colm1" border="1">
                    <tr>
                        <td class="fila1"><p>Fecha Inicio</p></td>
                        <td class="fila"><p>Fecha Fin</p></td>
                    </tr>
                    <?php for ($i=0; $i<$cantidad; $i++) { ?>
                        <tr>
                            <td><?php echo "fechaIni"; ?></td>
                            <td><?php echo "fechaFin"; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>