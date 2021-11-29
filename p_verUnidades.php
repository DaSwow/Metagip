<?php
include 'db.php';
session_start();
$clave = $_POST['clave'];
$stringClave = '"' . "clave" . '"';
$stringClaveCurso = '"' . "claveCurso" . '"';
$query = "SELECT * FROM public.cursos WHERE $stringClave='$clave';";
$consulta = pg_query($conexion, $query);
$curso = pg_fetch_row($consulta);
$cantidadUnidades = $curso[4];

$query = "SELECT * FROM public.unidades WHERE $stringClaveCurso='$clave';";
$consulta = pg_query($conexion, $query);

for ($i = 0; $i < $cantidadUnidades; $i++) {
    
}


$unidades = pg_fetch_all($consulta);
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

            <table class="colm1" border="1"   >
                <tr style="width: 300px; ">
                    <td class="fila1"><p>Unidad</p></td>
                    <td class="fila1"><p>Fecha Inicio</p></td>
                    <td class="fila"><p>Fecha Fin</p></td>
                </tr>
                <?php for ($i = 1, $j = 1; $i <= ($cantidadUnidades * 2); $i = $i + 2, $j++) { ?>



                    <tr style="width: 300px; ">
                        <td><?php echo $j; ?></td>
                        <td><input id="date" name="fechaInicio<?php echo$i ?>" type="text" value="<?php echo $unidades[$i]['fechaIni'] ?>" style="width: 200px;" ></td>
                        <td><input id="date" name="fechaFin<?php echo$i ?>"    type="text" value="<?php echo $unidades[$i]['fechaFin'] ?>" style="width: 200px;" ></td>
                    </tr>
                <?php } ?>

            </table>
            <br><br>
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