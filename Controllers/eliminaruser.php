<?php
include ("../php/conexion.php");
$id2=$_GET['id_usuario'];
$sql="DELETE FROM usuarios where id_usuario='".$id2."'";
$result=mysqli_query($conexion,$sql);
header("Location:../Assets/admin.php");
?>
