<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_name = trim($_POST['team_name']);

    // Validar que el nombre del equipo no esté vacío
    if (!empty($team_name)) {
        // Verificar si el equipo ya está registrado
        $stmt = $conn->prepare("SELECT id FROM teams WHERE name = ?");
        $stmt->bind_param("s", $team_name);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // El equipo ya está registrado
            echo "Este equipo ya está registrado.";
        } else {
            // El equipo no está registrado, proceder a insertarlo
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO teams (name) VALUES (?)");
            $stmt->bind_param("s", $team_name);

            if ($stmt->execute()) {
                echo "Equipo registrado exitosamente.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "El nombre del equipo no puede estar vacío.";
    }
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar la conexión
$conn->close();
?>

<a href="admin.php">Volver</a>
