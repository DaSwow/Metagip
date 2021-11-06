<?php
        $db = parse_url(getenv("DATABASE_URL"));
        $db["path"] = ltrim($db["path"], "/");
        //$host = $db['host'];
        //$dbname = $db['db'];
        //$port = $db[2];
        //$user = $db[3];
        //$password = $db[4];
        //$string_conexion = "$host $dbname $port $user $password";
        //echo $string_conexion;
        echo print_r($db);
        //$conexion = pg_connect($db) or die('failed');
        
?>