<link rel="stylesheet" type="text/css" href="./Libraries/CSS/categoria.css">
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
        
        <a href="./Views/verCategoria.php?nombre=<?php echo $fila['nombre']; ?>">
          <div class="circle">
            <img src="./Libraries/IMG/<?php echo $fila['foto_categoria'];?>" alt="">
            <p><?php echo $fila['nombre']; ?></p>
          </div></a>
        
    <?php 
      }
    } else {
      echo "No se encontraron categorías.";
    }
    ?>
  </div>
</div>