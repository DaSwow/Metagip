<?php

session_start();

require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM alumnos WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Task Removed Successfully';
    $_SESSION['message_type'] = 'danger';
    echo "<script type='text/javascript'>location='p_gestAlumnos.php';</script>";
}
?>