<?php
include ("../php/conexion.php");
$id2=$_GET['id_categoria'];
$sql="DELETE FROM categoria where id_categoria='".$id2."'";
$result=mysqli_query($conexion,$sql);
header("Location:../Assets/admin.php");
?>
