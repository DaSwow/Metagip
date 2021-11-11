<?php

session_start();

?>

<!DOCTYPE html>

<html lang="en">
    <head>

        <link rel="stylesheet" href="style.css">

        <title>Menu Principal</title>
    </head>
    <body>
        <div class="container">
            <div class="menu-container">
                <div class="menu">
                    <h2>Menu Principal</h2>
                    <?php echo $_SESSION["nombre_usuario"]; ?>
                    <form action="">
                        <input type="submit" class="submnit" formaction="p_gestAlumnos.php" value="Gestionar Alumnos">
                        <input type="submit" class="submnit" formaction="p_gestCursos.php" value="Gestionar Cursos">
                        <input type="submit" class="submnit" formaction="" value="Registrar Alumnos">
                        <input type="submit" class="submnit" formaction="" value="Importar CVS">
                        <input type="submit" class="submnit" formaction="" value="Administrar Asistencias">
                        <input type="submit" class="submnit" formaction="index.php" value="Log Out">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>