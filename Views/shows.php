<link rel="stylesheet" href="../Libraries/CSS/productos.css">
<?php 
include("../PHP/conexion.php");

$query = "SELECT * FROM producto";
$resultado = $conexion->query($query);
?>
<div class="content-flex">
  <?php 
  if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
  ?>
      <div class="card">
        <img src="../Libraries/IMG/<?php echo $fila['foto_producto'];?>" alt="<?php echo $fila['nombre_producto']; ?>">
        <h1><?php echo $fila['nombre_producto']; ?></h1>
        <h2  class="price"> <?php echo $fila['precio']; ?></h2>
        <p><?php echo $fila['descripcion']; ?></p>
        <p>Stock : <?php echo $fila['stock']?></p>
        <p><button>Add to Cart</button></p>
      </div>
  <?php 
    }
  } else {
      echo "No se encontraron productos.";
  }
  ?>
</div>

