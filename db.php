<?php
        $db = parse_url(getenv("DATABASE_URL"));
        $db["path"] = ltrim($db["path"], "/");
        $host = $db['host'];
        $dbname = $db['path'];
        $port = $db['port'];
        $user = $db['user'];
        $password = $db['pass'];
        $string_conexion = "host=$host dbname=$dbname port=$port user=$user password=$password";
        $conexion = pg_connect($string_conexion) or die('failed');
        
?>