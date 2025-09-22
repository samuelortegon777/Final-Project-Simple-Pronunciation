<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];

    $stmt = $mysqli->prepare("INSERT INTO usuarios (username,password, email, fullname ) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password,$email,$fullname);
    $stmt->execute();

    echo "Registrado correctamente. <a href='../index.html'>Iniciar sesión</a>";
}
?>  