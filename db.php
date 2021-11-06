<?php
        $db = parse_url(getenv("DATABASE_URL"));
        $db["path"] = ltrim($db["path"], "/");
        $host = $db['host'];
        $dbname = $db['path'];
        $port = $db['port'];
        $user = $db['user'];
        $password = $db['user'];
        $string_conexion = "host=$host dbname=$dbname port=$port user=$user pass=$password";
        echo $string_conexion;
        $conexion = pg_connect($string_conexion) or die('failed');
        
?>