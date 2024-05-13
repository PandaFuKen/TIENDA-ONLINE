<link rel="stylesheet" href="../Libraries/CSS/productos.css">
<?php 
include("./PHP/conexion.php");

$query = "SELECT * FROM pr";
$resultado = $conexion->query($query);
?>
<div class="content-flex">
<div class="card">
  <img src="../Libraries/IMG/Autos.jpg" alt="Denim Jeans" style="">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
  <p><button>Add to Cart</button></p>
</div>
</div>

