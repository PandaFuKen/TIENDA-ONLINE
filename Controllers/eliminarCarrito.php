<?php
include ("../php/conexion.php");
$id2=$_GET['id'];
$sql="DELETE FROM detallescarrito where id='".$id2."'";
$result=mysqli_query($conexion,$sql);
header("Location:verProdCarrito.php");
?>
