<?php
include 'db.php';

// Eliminar primero todas las filas de group_teams
$conn->query("DELETE FROM group_teams");

// Luego eliminar todas las filas de groups
$conn->query("DELETE FROM groups");

// Crear grupos (A-H)
$groups = [];
for ($i = 0; $i < 8; $i++) {
    $group_name = chr(65 + $i); // A, B, C, D, E, F, G, H
    $conn->query("INSERT INTO groups (group_name) VALUES ('$group_name')");
    $groups[] = $conn->insert_id;
}

// Obtener todos los equipos
$sql = "SELECT id FROM teams";
$result = $conn->query($sql);

$teams = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $teams[] = $row["id"];
    }
}

// Mezclar equipos y asignar a grupos
shuffle($teams);
$group_count = count($groups);
for ($i = 0; $i < count($teams); $i++) {
    $group_id = $groups[$i % $group_count];
    $team_id = $teams[$i];
    $conn->query("INSERT INTO group_teams (group_id, team_id) VALUES ($group_id, $team_id)");
}

echo "Sorteo generado exitosamente";

$conn->close();
?>

<a href="admin.php">Volver</a>
