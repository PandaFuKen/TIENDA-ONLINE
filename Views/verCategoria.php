<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico">

<!--Estilos css-->
<link rel="stylesheet" type="text/css" href="../Libraries/CSS/vistaProducto.css">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatisble" content="IE=edge">
        <title>Chedraui</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <?php //include ("navbar.php"); la ruta según la ubicación de tu archivo
    ?>

    <body>

    <?php
// Conexión a la base de datos y otras configuraciones necesarias
 include("../PHP/conexion.php");

// Verificar si se recibió un ID de producto válido
$idCateoria = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idCateoria > 0) {

    // Consultar la base de datos para obtener los detalles del producto con el ID proporcionado
    $query = $conexion->prepare("SELECT * FROM producto WHERE id_categoria = ?");
    $query->bind_param("i", $idCateoria);
    $query->execute();

// Obtener el resultado
$result = $query->get_result();
$producto = $result->fetch_assoc();

    if ($producto) {?>

    <a href="./Views/vistaProducto.php?id=<?php echo $fila['id_producto']; ?>">
        <div class="card">
        <img src="./Libraries/IMG/<?php echo $fila['foto_producto'];?>" alt="<?php echo $fila['nombre_producto']; ?>">
        <h1><?php echo $fila['nombre_producto']; ?></h1>
        <h2  class="price"> <?php echo $fila['precio']; ?></h2>
        <p><button>Agregar al carrito</button></p>
        </div>
    </a>

   <?php

   } else {
        echo "Producto no encontrado".$producto['id_producto'];
    }
} else {
    echo "ID de producto no válido.";
}
?>

<style type="text/css">
/*IMAGEN CENTRADA */
img{
    width: 200px;
    height: 300px;
    object-fit: cover;
    object-position: 0% 50%;
    }

</style>


<script type="text/javascript">
       // Obtener los elementos relevantes del DOM
       var cantidadInput = document.getElementById("cantidadd");
    var cantidadHidden = document.getElementById("cantidadHidden");

    // Agregar un evento de escucha para detectar cambios en el campo de texto
    cantidadInput.addEventListener("input", function() {
        // Obtener el valor del campo de texto y convertirlo a un entero
        var cantidad = parseInt(cantidadInput.value);

        // Verificar si la cantidad es un número válido
        if (!isNaN(cantidad) && cantidad > 0) {
            // Actualizar el valor del campo oculto con la nueva cantidad
            cantidadHidden.value = cantidad;
        } else {
            // Si la cantidad ingresada no es válida, establecer el valor predeterminado en 1
            cantidadInput.value = "1";
            cantidadHidden.value = "1";
        }
    });

    // Escuchar eventos de clic en los botones de incremento y decremento
    document.getElementById("btnIncrementar").addEventListener("click", function() {
        var cantidad = parseInt(cantidadInput.value);
        cantidad++;
        cantidadInput.value = cantidad;
        cantidadHidden.value = cantidad;
    });

    document.getElementById("btnDecrementar").addEventListener("click", function() {
        var cantidad = parseInt(cantidadInput.value);
        if (cantidad > 1) {
            cantidad--;
            cantidadInput.value = cantidad;
            cantidadHidden.value = cantidad;
        }
    });

</script>