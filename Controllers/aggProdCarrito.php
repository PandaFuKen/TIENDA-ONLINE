<?php
include('../PHP/conexion.php');
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    try {
        if (isset($_GET['id_producto'], $_GET['cantidad']) && !empty($_GET['id_producto']) && !empty($_GET['cantidad'])) {

    $idUsuario = $_SESSION['id_usuario'];
    // Obtener los datos del producto (id del producto, )
    $id_pedido = 1;
    $idProducto = $_GET['id_producto'];
    $cantidad = intval($_GET["cantidad"]);

    $query = "INSERT INTO detallescarrito (pedido_id, producto_id, cantidad, id_usuario) VALUES (:pedido_id, :producto_id, :cantidad, :id_usuario)";

    $statement = $conexion->prepare($query);
    //$statement->bindParam('idUsuario', $idUsuario);
    $statement->bindParam(':pedido_id', $id_pedido);
    $statement->bindParam(':producto_id', $idProducto);
    $statement->bindParam(':cantidad', $cantidad);
    $statement->bindParam(':id_usuario', $idUsuario);
    $statement->execute();

            echo '<script type="text/javascript">
            alert("Producto agregado correctamente al carrito");
            window.location.href="../Views/vistaProducto.php?id=' . $idProducto . '";
            </script>';
        } else {
            throw new Exception("Datos del formulario incompletos.");
        }
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conexion->rollback();
        echo "Error al agregar el producto al carrito: " . $e->getMessage();
    }
} else {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: ../Assets/login.php');
    exit;
}
?>
