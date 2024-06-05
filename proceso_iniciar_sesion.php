<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validar que el nombre de usuario y la contraseña no estén vacíos
    if (!empty($username) && !empty($password)) {
        // Verificar si el nombre de usuario existe
        $stmt = $conn->prepare("SELECT id, password FROM players WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $password_hashed);
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
            // Verificar la contraseña
            if (password_verify($password, $password_hashed)) {
                // Iniciar sesión exitosamente
                $_SESSION['player_id'] = $id;
                $_SESSION['username'] = $username;
                echo "Inicio de sesión exitoso. Bienvenido, " . $username;
                // Redireccionar a una página protegida (por ejemplo, `admin.php`)
                header("Location: principal.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "El nombre de usuario no está registrado.";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "El nombre de usuario y la contraseña no pueden estar vacíos.";
    }
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar la conexión
$conn->close();
?>

<a href="iniciar_sesion.php">Volver</a>
