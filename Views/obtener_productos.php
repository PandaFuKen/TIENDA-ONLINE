
<link rel="stylesheet" href="../Libraries/CSS/productos.css">


<?php 
include("../PHP/conexion.php");

if(isset($_POST['categoria_id'])) {
  $categoria_id = $_POST['categoria_id'];

  // Consulta para obtener los productos de la categoría seleccionada
  $query_productos = "SELECT * FROM productos WHERE categoria_id = $categoria_id";
  $resultado_productos = $conexion->query($query_productos);

  // Generar la respuesta HTML con los productos
  if ($resultado_productos && $resultado_productos->num_rows > 0) {
    while ($producto = $resultado_productos->fetch_assoc()) {
      echo "<div class='card'>";
      echo "<img src='../Libraries/IMG/" . $producto['foto_producto'] . "' alt='" . $producto['nombre_producto'] . "'>";
      echo "<h1>" . $producto['nombre_producto'] . "</h1>";
      echo "<p class='price'>$" . $producto['precio'] . "</p>";
      echo "<p>" . $producto['descripcion'] . "</p>";
      echo "<p>Stock: " . $producto['stock'] . "</p>";
      echo "<p><button>Add to Cart</button></p>";
      echo "</div>";
    }
  } else {
    echo "No se encontraron productos en esta categoría.";
  }
} else {
  echo "Error: No se proporcionó una categoría.";
}
?>
