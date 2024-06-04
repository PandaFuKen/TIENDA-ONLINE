<?php
include ("../php/conexion.php");
$id2=$_GET['id_producto'];
$sql="DELETE FROM producto where id_producto='".$id2."'";
$result=mysqli_query($conexion,$sql);
header("Location:../Assets/admin.php");
?>
