<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

include("conexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1><?=$usuario?></h1>
    <?php
    //echo "<h1>$contraseña</h1>";

    $conn = new mysqli($host, $user, $passwd, $db);

    if($conn->connect_error){
        die("Error al conectar la base datos:");
    }else{
        ?>

    <p>Conectado con exito!!!</p>

        <?php
    }
    ?>
</body>
</html>
