<link rel="stylesheet" type="text/css" href="./Libraries/CSS/categoria.css">
<?php
include("./PHP/conexion.php");

$query = "SELECT * FROM categoria";
$resultado = $conexion->query($query);
?>

<div class="contenedor-categorias">
  <h2>Todas las categorías</h2>
  <div class="flex-container">
    <?php 
    if ($resultado && $resultado->num_rows > 0) {
      while ($fila = $resultado->fetch_assoc()) {
    ?>
        
        <a href="./Views/verProductosCategoria.php?id=<?php echo $fila['id_categoria']; ?>">
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