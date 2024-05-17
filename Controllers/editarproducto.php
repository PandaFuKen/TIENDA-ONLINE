<?php

// Al principio del script, inicia la sesión
//session_start();

require_once "../PHP/conexion.php";
// Obtener categorías desde la base de datos
$id2=$_GET['id_producto'];
$sql="SELECT*FROM producto where id_producto='".$id2."'";
$result=mysqli_query($conexion,$sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el usuario está autenticado

    if(isset($_SESSION['id_usuario'])) {
        // Verificar si el usuario es un administrador
        if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
            $id_usuario = $_SESSION['id_usuario'];

            // Recuperar datos del formulario
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

            // Mueve la foto de la ruta temporal a la ruta definitiva
            move_uploaded_file($Foto_temp, $ruta.$Foto);

            // Validar datos del formulario
            if($nombre != "" && $precio != "" && $descripcion != "" && $stock != "" && $categoria_id != "" && $Foto != "" && $id_usuario !="") {
                // Insertar el producto en la base de datos
                $sql_insert = "UPDATE producto SET nombre_producto=$nombre, descripcion=$descripcion, precio=$precio, stock=$stock, foto_producto=$Foto, id_categoria=$categoria_id, WHERE id_producto=$producto_id";
                $result_insert = mysqli_query($conexion, $sql_insert);

                if ($result_insert) {
                    // Redirigir al usuario a una página de éxito o mostrar un mensaje de éxito
                    header("Location:../Assets/admin.php");
                    exit();
                } else {
                    echo "Error al agregar producto: " . mysqli_error($conexion);
                }
            } else {
                echo "Por favor, complete todos los campos del formulario";
            }
        } else {
            echo "Solo los administradores pueden agregar productos.";
        }
    } else {
        echo "Usuario no autenticado";
    }
}
?>
<link rel="stylesheet" href="../Libraries/CSS/registros.css">

<div class="contenedor-sticky">
    <form method="post" class="box" enctype="multipart/form-data">
        <h1 class="Inicio">Registro</h1>
        <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto']?>">
        <label for="">Ingresa el nombre del producto:</label>
        <input type="text" name="nombre_producto" class="Ingreso">
        <label for="">Ingresa el precio:</label>
        <input type="text" name="precio" placeholder="Precio" class="Ingreso">
        <label for="">Ingresa una descripción:</label>
        <input type="text" name="descripcion" placeholder="Descripción" class="Ingreso">
        <label for="">Ingresa la cantidad:</label>
        <input type="text" name="stock" placeholder="Stock" class="Ingreso">
        <label for="">Selecciona una categoría:</label>
        <select name="categoria" class="Ingreso">
            <?php foreach($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="">Selecciona una foto:</label>
        <input type="file" name="foto_producto">
        <input type="submit" value="Agregar" id="registrar">
    </form>
</div>
