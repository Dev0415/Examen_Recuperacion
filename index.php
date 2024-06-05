<?php
session_start();
include 'db.php';

if (!isset($_SESSION['player_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Champions League 2025</title>
    <link rel="icon" href="img/star-logo-icon-art-design-600nw-2247981595.jpg">
    <style>
        body {
            background-image: url('img/CL.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
    color: #ffffff;
    text-align: center;
    padding: 50px;
       
        }
 

input[type="text"], input[type="submit"] {
    padding: 10px;
    margin: 10px;
    border-radius: 5px;
    border: none;
}

input[type="submit"] {
    background-color: #6a0dad;
    color: #ffffff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #5a0cad;
}

table {
    margin: 0 auto;
    border-collapse: collapse;
    width: 80%;
}

th, td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #6a0dad;
    color: white;
}

tr:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.1);
}

tr:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

a {
    color: inherit;
    text-decoration: none;
}
button {
    background-color: #2a5298;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
}
button a {
    text-decoration: none;
    color: inherit;
}

    </style>
</head>
<body>
    <h1>Champions League 2025</h1>
    <h2>Equipos Registrados</h2>
    <table>
        <tr>
            <th>Nombre del Equipo</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Consulta para obtener todos los equipos
        $result = $conn->query("SELECT id, name FROM teams");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>
                        <form action='eliminar_equipo.php' method='post' style='display:inline;'>
                            <input type='hidden' name='team_id' value='" . $row['id'] . "'>
                            <input type='submit' value='Eliminar'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay equipos registrados.</td></tr>";
        }
        $result->free();
        ?>
    </table>
    <br>
    <button onclick="window.location.href='admin.php'">Registrar Nuevo Equipo</button>

    <h2>Resultados del Sorteo</h2>
    </div>
    <?php
    $sql = "SELECT g.group_name, t.name FROM group_teams gt
            JOIN groups g ON gt.group_id = g.id
            JOIN teams t ON gt.team_id = t.id
            ORDER BY g.group_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $current_group = '';
        while ($row = $result->fetch_assoc()) {
            if ($current_group != $row["group_name"]) {
                if ($current_group != '') {
                    echo "</ul>";
                }
                $current_group = $row["group_name"];
                echo "<h3>Grupo " . $current_group . "</h3><ul>";
            }
            echo "<li>" . $row["name"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aún no se han generado los grupos.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
