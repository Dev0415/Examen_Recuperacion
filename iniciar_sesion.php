<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
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
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .contenedor {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
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
        <h1>Iniciar Sesión</h1>
        <form action="login_process.php" method="post">
            Nombre de usuario: <input type="text" name="username" required><br>
            Contraseña: <input type="password" name="password" required><br>
            <input type="submit" value="Iniciar Sesión">
            <a href="registrar_jugador.php">Crear una cuenta</a>
        </form>
    </div>
</body>
</html>
