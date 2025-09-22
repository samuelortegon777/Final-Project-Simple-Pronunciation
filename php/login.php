<?php
session_start();
include("db.php"); // aquí conectas a la BD, crea $mysqli

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
  
    // Consulta usando idUsuario y password (texto plano)
    $stmt = $mysqli->prepare("SELECT idUsuario, password FROM usuarios WHERE username = ?");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($idUsuario, $hash);
        $stmt->fetch();
        // Comparación directa para contraseñas en texto plano
        if (trim($password) === trim($hash)) {
            $_SESSION["user_id"] = $idUsuario;
            header("Location: ../monoSilabas.html");
            exit;
        } else {
            header("Location: ../contraseñaIncorrecta.html");
        }
    } else {
        header("Location: ../noUser.html");
    }

    $stmt->close(); 
}
?>