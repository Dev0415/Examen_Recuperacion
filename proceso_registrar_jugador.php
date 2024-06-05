<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validar que el nombre de usuario y la contraseña no estén vacíos
    if (!empty($username) && !empty($password)) {
        // Verificar si el nombre de usuario ya está registrado
        $stmt = $conn->prepare("SELECT id FROM players WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // El nombre de usuario ya está registrado
            echo "Este nombre de usuario ya está registrado.";
        } else {
            // El nombre de usuario no está registrado, proceder a insertarlo
            $stmt->close();

            // Hash de la contraseña
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO players (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password_hashed);

            if ($stmt->execute()) {
                echo "Jugador registrado exitosamente.";
            } else {
                echo "Error: " . $stmt->error;
            }
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

<a href="registrar_jugador.php">Volver</a>
