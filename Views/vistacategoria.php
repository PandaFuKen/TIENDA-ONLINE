<link rel="stylesheet" href="./Libraries/CSS/categoria.css">

<?php
include("./PHP/conexion.php");

$query = "SELECT * FROM categoria";
$resultado = $conexion->query($query);
?>

<div class="contenedor-categorias">
  <h2>Todas las categorías:</h2>
  <div class="flex-container">
    <?php 
    if ($resultado && $resultado->num_rows > 0) {
      while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="circle">
          <img src="../Libraries/IMG/<?php echo $fila['foto_categoria']; ?>" alt="" class="imagen">
          <a href="#"><p><?php echo $fila['nombre']; ?></p></a>
        </div>
    <?php 
      }
    } else {
      echo "No se encontraron categorías.";
    }
    ?>
  </div>
</div>
