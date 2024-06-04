<link rel="stylesheet" type="text/css" href="./Libraries/CSS/productos.css">
<?php 
include("./PHP/conexion.php");

$query = "SELECT * FROM producto";
$resultado = $conexion->query($query);
?>
<h2>Promociones</h2>
<div class="content-flex">
  <?php 
  if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
  ?>
    <a href="./Views/vistaProducto.php?id=<?php echo $fila['id_producto']; ?>">
      <ul class="card">
        <img class="imgPr" src="./Libraries/IMG/<?php echo $fila['foto_producto'];?>" alt="<?php echo $fila['nombre_producto']; ?>">
        <h1><?php echo $fila['nombre_producto']; ?></h1>
        <h2  class="price">$<?php echo $fila['precio']; ?></h2>
        </a>
        <form action="./Controllers/aggProdCarrito.php">
        <p><button type="submit" value="<?php echo $fila['id_producto']; ?>" >Agregar al carrito</button></p>
        </form>
      </ul>
  <?php
    }
  } else {
      echo "No se encontraron productos.";
  }
  ?>
</div>

