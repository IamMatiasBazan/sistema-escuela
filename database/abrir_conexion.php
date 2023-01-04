<?php
    $host="127.0.0.1";
    $port=3306;
    $socket="";
    $user="root";
    $password="";
    $dbname="escuela";

    $conexion = new mysqli($host, $user, $password, $dbname, $port, $socket);

    $tabla1 = "clases";
    $tabla2 = "materias";
    $tabla3 = "roles";
    $tabla4 = "usuarios";

    if ($conexion -> connect_errno) {
        echo "Nuestro sitio esta experimentando fallos";
        exit();
    }
  

?>