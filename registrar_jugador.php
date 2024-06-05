<!DOCTYPE html>
<html>
<head>
    <title>Registrar Jugador</title>
    <link rel="icon" href="img/star-logo-icon-art-design-600nw-2247981595.jpg">
    <style>
        body {
            background-image: url('img/logo-uefa-champions-league.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }
        .contenedor {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #1e3c72;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #2a5298;
        }
        a {
            color: #87CEFA;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Registrar Jugador</h1>
        <form action="register_player_process.php" method="post">
            <input type="text" name="username" placeholder="Nombre de usuario" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <input type="submit" value="Registrar">
            <br>
            <a href="iniciar_sesion.php">¿Ya tienes una cuenta?
                <br>
            Inicia sesión</a>
        </form>
    </div>
</body>
</html>
