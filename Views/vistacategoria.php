<link rel="stylesheet" href="../Libraries/CSS/categoria.css">

<?php
include("../php/conexion.php");

$sql = "SELECT * FROM categoria";
$result = mysqli_query($conexion, $sql);
?>
<div class="contenedor-categorias">
  <h2>Todas las categorías:</h2>
  <div class="flex-container">
    <?php while ($fila = mysqli_fetch_array($result)) { ?>
      <div class="circle">
        <!-- Mostrar la información de la categoría -->
        
        <a href="#"><p><?php echo $fila['nombre']; ?></p></a>
      </div>
    <?php } ?>
  </div>
</div>
