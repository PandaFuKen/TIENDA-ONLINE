<?php

include('../PHP/conexion.php');
session_start();

//validamos si el usuario ha iniciado sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

try {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
    //obtenemos el id del usuario
    $idUsuario = $_SESSION['idUsuario'];
    // Obtener los datos del producto (id del producto, )
    $idProducto = $_GET['id'];
    $cantidad = intval($_GET["cantidad"]);

    $query = "INSERT INTO detallescarrito (pedido_id, producto_id, cantidad, usuario_id) VALUES (:pedido_id, :producto_id, :cantidad, :usuario_id)";

    $statement = $connection->prepare($query);
    //$statement->bindParam('idUsuario', $idUsuario);
    $statement->bindParam(':pedido_id', $id_pedido);
    $statement->bindParam(':producto_id', $idProducto);
    $statement->bindParam(':cantidad', $cantidad);
    $statement->bindParam(':usuario_id', $idUsuario);
    $statement->execute();

    ?>
    <script type="text/javascript">
        var idProducto="<?php echo $idProducto;?>";
    </script>

    <?php
    echo'<script type="text/javascript">
    alert("Producto agregado a la Carta");
    window.location.href="../Views/vistaProducto.php?id="+idProducto;
    </script>';

}else{
    echo "producto no encontrado";
}

} catch(PDOException $e) {
    echo "Error al agregar el producto al pedido: " . $e->getMessage();
}

} else {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: ../Assets/login.php');
    exit;
}
?>