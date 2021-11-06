<?php
        $db = parse_url(getenv("DATABASE_URL"));
        $db["path"] = ltrim($db["path"], "/");
        $string_conexion = "host=$db[1] dbname=$db[5] port=$db[2] user=$db[3] password=$db[4]";
        $conexion = pg_connect($connection_string) or die('failed');
        
?>