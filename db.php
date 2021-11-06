<?php
        $db = parse_url(getenv("DATABASE_URL"));
        $db["path"] = ltrim($db["path"], "/");
        $string_conexion = "host=ec2-3-226-211-228.compute-1.amazonaws.com dbname=dcjv6v0os1b0hh port=5432 user=dazlcuyqhdonwj password=6417c3ad9bbfea318806931ed986394fff42683703d75e8515f3329966d4b41f]";
        $conexion = pg_connect($connection_string) or die('failed');
        
?>