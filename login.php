<?php
session_start();

$usuario = $_REQUEST['usuario'];
$contra = $_REQUEST['contraseña'];

//include()
require('conexion.php');

//Conexion a la base de datos
$conexion = new mysqli($host, $user, $passwd, $db);

if($conexion->connect_error){
    header("Location: index.php?error=1");
}

$SQL = "select 
* 
from 
	pacientes
where
	usuario = '$usuario' 
	and  contraseña = md5('$contra')";

$resultado = $conexion->query($SQL);

$existe = $resultado->num_rows;

if($existe){
    $tupla = $resultado->fetch_assoc();

    $_SESSION['sesion']=$tupla['tipo'];
    
    $_SESSION['usuario']=$tupla['nombre']." ".$tupla['ap_paterno'];
    header('Location: consultas.php');
}else{
    header("Location: index.php?error=2");
}

$conexion->close();
?>