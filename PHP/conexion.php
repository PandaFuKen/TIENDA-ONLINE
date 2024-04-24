<?php 
$host = 'localhost';
$usuario = 'root';
$clave = '';
$bd = 'chedraui';
$conexion = mysqli_connect($host,$usuario,$clave,$bd);
if($conexion->connect_error){
    die("Conexion Fallida :" . $conexion->connect_error);
}
echo ("Hola estoy en linea");
?>