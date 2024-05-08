<link rel="stylesheet" href="../Libraries/CSS/categoria.css">

<?php
include("../php/conexion.php");
require $_SERVER['DOCUMENT_ROOT'].'/PHP/conexion.php'; 

// Usar solo PDO para la conexión

$categorias = $db->query('SELECT `id_categoria`, `nombre` FROM `categorias` ORDER BY name ASC');
$items = $db->query('SELECT id_cateo.id, items.name, items.description, items.price, items.image,items.opciones,items.extras, categorias.name AS category FROM items LEFT JOIN categorias ON items.category = categorias.id ORDER BY items.id DESC');

?>

<div class="contenedor-categorias">
  <h2>Todas las categorías:</h2>
  <div class="flex-container">
    <?php while ($fila = $categorias->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="circle">
        <!-- Mostrar la información de la categoría -->
        <a href="#"><p><?php echo $fila['name']; ?></p></a>
      </div>
    <?php } ?>
  </div>
</div>
