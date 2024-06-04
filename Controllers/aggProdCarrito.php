<?php
include('../PHP/conexion.php');
session_start();

//validamos si el usuario ha iniciado sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    try {
        if (isset($_GET['id_producto']) && !empty($_GET['id_producto'])) {
            //obtenemos el id del usuario
            $idUsuario = $_SESSION['idUsuario'];
            // Obtener los datos del producto (id del producto, )
            $idProducto = $_GET['id_producto'];
            $cantidad = intval($_GET["cantidad"]);

            $query = "INSERT INTO detallescarrito (pedido_id, producto_id, cantidad, usuario_id) VALUES (?, ?, ?, ?)";

            if ($statement = $conexion->prepare($query)) {
                $statement->bind_param( $pedido_id, $idProducto, $cantidad, $idUsuario);
                $statement->execute();

                ?>
                <script type="text/javascript">
                    var idProducto = "<?php echo $idProducto; ?>";
                </script>

                <?php
                echo '<script type="text/javascript">
                alert("Producto agregado a la Carta");
                window.location.href="../Views/vistaProducto.php?id=" + idProducto;
                </script>';

                $statement->close();
            } else {
                echo "Error al preparar la consulta: " . $connection->error;
            }

        } else {
            echo "Producto no encontrado";
        }

    } catch (Exception $e) {
        echo "Error al agregar el producto al pedido: " . $e->getMessage();
    }

} else {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: ../Assets/login.php');
    exit;
}
?>
