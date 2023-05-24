<?php
session_start();

$id = session_id();
$error=0;

//if(empty($_GET['error']))
if(isset($_GET['error'])){
    $error = $_GET['error'];
}

?>

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
        <p>ID de Sesion: <?=$id;?> </p>
    </header>

<?php
    if(!isset($_SESSION['sesion'])){
?>

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
    <div id="error">
        <?php
            if($error==2){
           
           ?>

<p class="text-danger">Usuario y Password no coinciden</p>

                <?php
            }

            if($error==3){
                ?>
<p class="text-warning bg-info">No tienes permiso para acceder a este recurso</p>
                <?php
            }

        ?>
    </div>

    <?php
        }else{
            ?>
<div id="logeado">
            <p>Logeado</p>
            <p><a href="cerrar.php">Cerrar Sesion</a></p>
</div>
           <?php 
        }
    ?>
</body>
</html>