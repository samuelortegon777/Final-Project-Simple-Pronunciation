<?php
$mysqli = new mysqli("localhost", "root", "PASSWORD", "palabras");
if ($mysqli->connect_errno) {
    echo "Fallo conexión: " . $mysqli->connect_error;
    exit();
    
}
?>