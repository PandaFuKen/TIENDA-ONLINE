<?php
$host = 'localhost';
$usuario = 'admin';
$clave = '9683';
$bd = 'chedraui';
$conexion = mysqli_connect($host,$usuario,$clave,$bd);
if($conexion->connect_error){
    die("Conexion Fallida :" . $conexion->connect_error);
}