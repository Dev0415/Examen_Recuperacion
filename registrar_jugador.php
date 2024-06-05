<!DOCTYPE html>
<html>
<head>
    <title>Registrar Jugador</title>
    <link rel="icon" href="img/star-logo-icon-art-design-600nw-2247981595.jpg">

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Registrar Jugador</h1>
    <form action="register_player_process.php" method="post">
        Nombre de usuario: <input type="text" name="username" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <input type="submit" value="Registrar">
        <br>
        <a href="iniciar_sesion.php">¿Ya tienes una cuenta? 
            <br> <br>
            Inicia sesión</a>
    </form>
</body>
</html>