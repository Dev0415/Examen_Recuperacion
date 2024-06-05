<?php
session_start();

if (!isset($_SESSION['player_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="img/star-logo-icon-art-design-600nw-2247981595.jpg">
    <title>Admin - Champions League 2025</title>
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
    <script>
        function validateForm() {
            var teamName = document.getElementById("teamName").value;
            if (teamName === "") {
                alert("Por favor, ingrese el nombre del equipo.");
                return false; // Previene el envío del formulario
            }
            return true; // Permite el envío del formulario si la validación es exitosa
        }
    </script>
</head>
<body>
    <h1>Administración de la Champions League 2025</h1>
    <h2>Registrar Equipo</h2>
    <form action="registrar_equipo.php" method="post">
        Nombre del equipo: <input type="text" name="team_name" required>
        <input type="submit" value="Registrar">
    </form>

    <h1>Generar Sorteo</h1>
    <form onsubmit="return validateForm()" method="post" action="Generar_sorteo.php">
        <label for="teamName">Nombre del Equipo Registrado:</label>
        <input type="text" id="teamName" name="teamName" required><br><br>
        <input type="submit" value="Generar Sorteo">
    </form>
    <br>
    <button><a href="index.php" style="text-decoration: none; color: inherit;">Ver los Equipos</a></button>
</body>
</html>
