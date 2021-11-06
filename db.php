<?php
        $db = parse_url(getenv("DATABASE_URL"));
        $db["path"] = ltrim($db["path"], "/");
        $host = $db[1];
        $dbname = $db[5];
        $port = $db[2];
        $user = $db[3];
        $password = $db[4];
        $string_conexion = "$host $dbname $port $user $password";
        echo $string_conexion;
        $conexion = pg_connect($db) or die('failed');
        
?>