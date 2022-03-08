<?php
$host = "localhost";
$bd = "sitio";
$usuario = "root";
$contraseña = "";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contraseña);
    // if ($conexion) {echo "Conectado al sistema <br />";}

} catch ( Exception $ex) {

    echo $ex -> getMessage();
}

?>