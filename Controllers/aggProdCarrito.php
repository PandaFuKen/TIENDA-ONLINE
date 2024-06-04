<?php
include('../PHP/conexion.php');
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    try {
        if (isset($_GET['id_producto'], $_GET['cantidad']) && !empty($_GET['id_producto']) && !empty($_GET['cantidad'])) {
            $idUsuario = $_SESSION['id_usuario'];
            // Obtener los datos del producto
            $id_pedido = 1; // Por favor, asegúrate de obtener este valor correctamente
            $idProducto = $_GET['id_producto'];
            $cantidad = intval($_GET["cantidad"]);

            $query = "INSERT INTO detallescarrito (pedido_id, producto_id, cantidad, id_usuario) VALUES (?, ?, ?, ?)";

            $statement = $conexion->prepare($query);
            $statement->bind_param('iiii', $id_pedido, $idProducto, $cantidad, $idUsuario);
            $statement->execute();

            echo '<script type="text/javascript">
            alert("Producto agregado correctamente al carrito");
            window.location.href="../Views/vistaProducto.php?id=' . $idProducto . '";
            </script>';
        } else {
            throw new Exception("Datos del formulario incompletos.");
        }
    } catch (Exception $e) {
        echo "Error al agregar el producto al carrito: " . $e->getMessage();
    }
} else {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: ../Assets/login.php');
    exit;
}
?>
