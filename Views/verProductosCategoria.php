<link rel="stylesheet" type="text/css" href="./Libraries/CSS/productos.css">
<?php 
include("../PHP/conexion.php");

$idProducto = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idProducto > 0) {


// Consultar la base de datos para obtener los detalles del producto con el ID proporcionado
$query = $conexion->prepare("SELECT * FROM producto WHERE id_producto = ?");
$query->bind_param("i", $idCateoria);
$resultado = $conexion->query($query);
?>
<div class="content-flex">
  <?php 
  if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
  ?>
      <a href="./Views/vistaProducto.php?id=<?php echo $fila['id_producto']; ?>">
      <div class="card">
        <img src="./Libraries/IMG/<?php echo $fila['foto_producto'];?>" alt="<?php echo $fila['nombre_producto']; ?>">
        <h1><?php echo $fila['nombre_producto']; ?></h1>
        <h2  class="price"> <?php echo $fila['precio']; ?></h2>
        <p><button>Agregar al carrito</button></p>
      </div>
    </a>
  <?php
    }
  } else {
      echo "No se encontraron productos.";
  } } else {
    echo "ID de producto no válido.";
}
  ?>
</div>

