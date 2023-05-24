<?php
session_start();

if(isset($_SESSION['usuario']) && $_SESSION['sesion']){
    $usuario = $_SESSION['usuario'];
    require("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Bienvenido <?=$usuario?></h1>
    <?php
    //echo "<h1>$contraseña</h1>";

    $conn = new mysqli($host, $user, $passwd, $db);

    if($conn->connect_error){
        die("Error al conectar la base datos:".$conn->connect_error);
    }else{
        ?>

    <p>Conectado con exito!!!</p>

        <?php
$sql = "SELECT 
            pacientes.id as id,
            pacientes.nombre,
            ap_paterno,
            ap_materno,
            ocupacion.nombre as descripcion,
            sexo,
            usuario,
            contraseña 
        FROM 
            pacientes, ocupacion
        WHERE
            pacientes.ocupacion = ocupacion.id
        ";

$resultado = $conn->query($sql);
$usuarios = $resultado->num_rows;

    if($usuarios>0){ 
?>
    <p>Hay <?=$usuarios;?> usuarios</p>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Ocupacion</th>
                <th>Sexo</th>
                <th>Usuario</th>
                <th>Password</th>
                <?php
                    if($_SESSION['sesion']==1){
                        ?>

                <th>Eliminar</th>
                        <?php
                    }
                ?>
                
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
            while($fila=$resultado->fetch_assoc()){

        ?>
            <tr>
                <td><?=$fila['id'];?></td>
                <td><?=$fila['nombre'];?></td>
                <td><?=$fila['ap_paterno'];?></td>
                <td><?=$fila['ap_materno'];?></td>
                <td><?=$fila['descripcion'];?></td>
                <td><?=$fila['sexo'];?></td>
                <td><?=$fila['usuario'];?></td>
                <td><?=$fila['contraseña'];?></td>
            </tr>  
            
            <?php
            }
            ?>
        </tbody>
    </table>    

<?php
        
        }
    else {
?>

<h1>Sin usuarios</h1>

<?php
    }
}
    //cerrar conexion
    $conn->close();

    ?>
    <p><a href="index.php">Regresar inicio</a></p>
    <?php
                    if($_SESSION['sesion']==1){
                        ?>

                <a href="crear.php">Crear usuario</a>
                        <?php
                    }
                ?>
<?php
}else{
    header("Location: index.php?error=3");
}
?>
</body>
</html>
