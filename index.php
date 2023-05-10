<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWTO</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <header id="encabezado">
        <h1>AWTO</h1>
        <p>Aplicaciones Web para TeleOperacion</p>
        <hr>
    </header>
    <form action="login.php" method="post">
        <div id="control1">
            <input type="text" id="usuario" name="usuario">
            <label for="usuario">Usuario</label>
        </div>
        <div id="control2">
            <input type="password" id="contraseña" name="contraseña">
            <label for="contraseña">Contraseña</label>
        </div>
        <div id="botonera">
            <button type="submit">Entrar</button>
            <button type="reset">Limpiar</button>
            <a href="registrar.php">No estas registrado</a>
        </div>
    </form>
</body>
</html>