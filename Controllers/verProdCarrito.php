<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="../favicon.ico">

<!--Estilos css-->
<link rel="stylesheet" href="../Libraries/CSS/navbar.css">
<?php include('../Views/config.php'); ?>
<html lang="es">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatisble" content="IE=edge">
        <title>Carta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <?php 
    include('../Views/config.php'); // Ajusta la ruta según la ubicación de tu archivo
    include_once  '../Views/navbar.php';
    ?>

    <body>
    <center>
        <div class="containerUbicacion">
        <?php
        include('../PHP/conexion.php');
        
        $idUsuario = $_SESSION['id_usuario'];
        
        $query = "SELECT * FROM detallescarrito WHERE id_usuario = ?";
        $statement = $conexion->prepare($query);
        $statement->bind_param("i", $idUsuario);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            // El usuario tiene productos agregados, mostrar la lista de productos
            $query = $conexion->prepare("SELECT * FROM detallescarrito WHERE id_usuario = ?");
            $query->bind_param("i", $idUsuario);
            $query->execute();
            $pedidos = $query->get_result();
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            <?php
            $total = 0; // Inicializar el total
            $precioTotalProducto = 0;

            // Mostrar los detalles de los productos en divs separados
            while ($pedido = $pedidos->fetch_assoc()) {
                // Obtener el nombre y el precio del producto basado en el ID del producto almacenado en detallespedido
                $queryProducto = $conexion->prepare("SELECT id_producto, nombre_producto, precio FROM producto WHERE id_producto = ?");
                $queryProducto->bind_param("i", $pedido['producto_id']);
                $queryProducto->execute();
                $producto = $queryProducto->get_result()->fetch_assoc();
                // Mostrar los detalles del producto
                ?>
                <tr>
                    <td class="textLocation"><?php echo $producto['id_producto']; ?> </td>
                    <td class="textLocation"><?php echo $producto['nombre_producto'] ?> (<?php echo $pedido['cantidad'];?>) </td>
                    <td class="textLocation">$<?php echo $producto['precio']; ?> </td>
                    <td>
                    <a href="eliminarCarrito.php?id=<?php echo $pedido ['id']?>"><button>Eliminar</button></a>
                </td>
                </tr>
                <?php
                $precioTotalProducto += ($producto['precio'] * $pedido['cantidad']);
            }
            $total += $precioTotalProducto;
            ?>
            <td class="textLocation">Total </td>
            <td></td>
            <td class="textLocation">$<?php echo number_format($total, 2); ?> </td>
            </table>
            <a href="../Pago/pagos.php?total=<?php echo number_format($total, 2); ?>" class="btn">
                <button type="submit" name="pagos" class="btn" id="btnLogIn" value="pagos">Pagar</button>
            </a>
            <?php
        } else {
            ?>
            <h1 class="title">No tienes ningun producto en tu carta</h1>
            <a href="../index.php"><input class="btn" id="btnDecrementar" type="button" value="Agregar Producto"></a>
            <?php
        }
        ?>
        </div>
    </center>

    <style type="text/css">

        table {
            justify-content:center;
            align-items:center;
            width: 1000px;
            border-collapse: collapse;
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
            font-variation-settings: "slnt" 0;
            font-size: large;
            text-align: center;
        }
        thead {
            position: sticky;
            top: 0;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
        }
        button{
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #F57C00;
    text-align: center;
    cursor: pointer;
    width: 300px;
    font-size: 18px;

}
    </style>
    <script src="" async defer></script>
    </body>
</html>
