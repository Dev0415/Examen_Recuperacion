<?php
session_start();
include 'db.php';

if (!isset($_SESSION['player_id'])) {
    header("Location: iniciar_sesion.php");
    exit();
}

if (isset($_POST['team_id'])) {
    $team_id = $_POST['team_id'];

    // Prepara la consulta para eliminar las referencias en group_teams
    $stmt = $conn->prepare("DELETE FROM group_teams WHERE team_id = ?");
    $stmt->bind_param("i", $team_id);

    if ($stmt->execute()) {
        // Ahora elimina el equipo de la tabla teams
        $stmt = $conn->prepare("DELETE FROM teams WHERE id = ?");
        $stmt->bind_param("i", $team_id);

        if ($stmt->execute()) {
            echo "Equipo eliminado exitosamente.";
        } else {
            echo "Error al eliminar el equipo.";
        }
    } else {
        echo "Error al eliminar las referencias del equipo en los grupos.";
    }

    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit();
} else {
    echo "ID de equipo no proporcionado.";
}
?>
