<?php
        $db = parse_url(getenv("DATABASE_URL"));
        $db["path"] = ltrim($db["path"], "/");
        $conexion = pg_connect("host=$db[1] dbname=$db[5] user=$db[3] password=$db[4]") or die('failed');
?>