<?php

session_start();
include("../php/conexion.php");

$id2 = $_GET['id_producto'];
$sql = "SELECT * FROM producto WHERE id_producto = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('i', $id2);
$stmt->execute();
$result = $stmt->get_result();

// Consulta para obtener las categorías
$sql_categorias = "SELECT id_categoria, nombre FROM categoria";
$result_categorias = mysqli_query($conexion, $sql_categorias);
$categorias = mysqli_fetch_all($result_categorias, MYSQLI_ASSOC);

while ($fila = $result->fetch_assoc()) {
?>
<link rel="stylesheet" href="../Libraries/CSS/registros.css">

<div class="contenedor-sticky">
    <form method="post" class="box" enctype="multipart/form-data">
        <h1 class="Inicio">Editar Producto <?php echo $fila['nombre_producto'] ?></h1>
        <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto'] ?>">
        <label for="">Ingresa el nombre del producto:</label>
        <input type="text" name="nombre_producto" class="Ingreso" value="<?php echo $fila['nombre_producto'] ?>">
        <label for="">Ingresa el precio:</label>
        <input type="text" name="precio" placeholder="Precio" class="Ingreso" value="<?php echo $fila['precio'] ?>">
        <label for="">Ingresa una descripción:</label>
        <input type="text" name="descripcion" placeholder="Descripción" class="Ingreso" value="<?php echo $fila['descripcion'] ?>">
        <label for="">Ingresa la cantidad:</label>
        <input type="text" name="stock" placeholder="Stock" class="Ingreso" value="<?php echo $fila['stock'] ?>">
        <label for="">Selecciona una categoría:</label>
        <select name="categoria" class="Ingreso">
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="">Selecciona una foto:</label>
        <input type="file" name="foto_producto">
        <input type="submit" value="Actualizar" id="registrar">
    </form>
</div>
<?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['id_usuario'])) {
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
            $id_usuario = $_SESSION['id_usuario'];

            $producto_id = $_POST['id_producto'];
            $nombre = $_POST['nombre_producto'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $stock = $_POST['stock'];
            $categoria_id = $_POST['categoria'];

            // Manejo de la foto
            $Foto = $_FILES['foto_producto']['name'];
            $Foto_temp = $_FILES['foto_producto']['tmp_name'];
            $ruta = "../Libraries/IMG/";
            move_uploaded_file($Foto_temp, $ruta . $Foto);

            if ($nombre != "" && $precio != "" && $descripcion != "" && $stock != "" && $categoria_id != "" && $id_usuario != "") {
                $sql_update = "UPDATE producto SET nombre_producto = ?, descripcion = ?, precio = ?, stock = ?, foto_producto = ?, id_categoria = ? WHERE id_producto = ?";
                $stmt_update = $conexion->prepare($sql_update);
                $stmt_update->bind_param('ssdisii', $nombre, $descripcion, $precio, $stock, $Foto, $categoria_id, $producto_id);
                $result_update = $stmt_update->execute();

                if ($result_update) {
                    header("Location:../Assets/admin.php");
                    exit();
                } else {
                    echo "Error al actualizar el producto: " . $conexion->error;
                }
            } else {
                echo "Por favor, complete todos los campos del formulario";
            }
        } else {
            echo "Solo los administradores pueden actualizar productos.";
        }
    } else {
        echo "Usuario no autenticado";
    }
}
?>
