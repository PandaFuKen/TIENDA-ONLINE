<link rel="stylesheet" href="./Libraries/CSS/categoria.css">

<?php
include("./PHP/conexion.php");
//require $_SERVER['DOCUMENT_ROOT'].'/PHP/conexion.php';

// Usar solo PDO para la conexión

$query = "SELECT * FROM categoria";
$resultado = $conexion->query($query);
?>

<div class="contenedor-categorias">
  <h2>Todas las categorías:</h2>
  <div class="flex-container">
    <?php if ($resultado) {
      while ($fila = $resultado->fetch_assoc()) {?>
      <div class="circle">
        <!-- Mostrar la información de la categoría -->
        <a href="#"><p><?php echo $fila['nombre']; ?></p></a>
      </div>
    <?php } }?>
  </div>
</div>
