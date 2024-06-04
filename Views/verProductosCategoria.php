<link rel="stylesheet" type="text/css" href="../Libraries/CSS/productos.css">
<link rel="stylesheet" href="../Libraries/CSS/navbar.css">
    <?php
     include ("../Views/navbar.php");
include("../PHP/conexion.php");

// Obtener el ID de la categoría desde los parámetros GET
$idCategoria = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idCategoria > 0) {
    // Preparar la consulta para obtener productos pertenecientes a la categoría especificada
    $query = $conexion->prepare("SELECT * FROM producto WHERE id_categoria = ?");
    $query->bind_param("i", $idCategoria);
    $query->execute();
    $resultado = $query->get_result();
?>
<div class="content-flex">
  <?php 
  if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
  ?>
      <a href="../Views/vistaProducto.php?id=<?php echo $fila['id_producto']; ?>">
      <ul class="card">
        <img class="imgPr" src="../Libraries/IMG/<?php echo $fila['foto_producto'];?>" alt="<?php echo $fila['nombre_producto']; ?>">
        <h1><?php echo $fila['nombre_producto']; ?></h1>
        <h2  class="price">$<?php echo $fila['precio']; ?></h2>
        </a>
        <form action="../Controllers/aggProdCarrito.php">
        <p><button type="submit" value="<?php echo $fila['id_producto']; ?>" >Agregar al carrito</button></p>
        </form>
      </ul>
  <?php
    }
  } else {
      echo "No se encontraron productos.";
  }
  // Cerrar la consulta
  $query->close();
} else {
    echo "ID de categoría no válido.";
}
?>
</div>
