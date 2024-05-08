<?php
// Verificar si no hay una sesión activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("../php/conexion.php");
include("../Controllers/validacion.php");

// Obtener categorías desde la base de datos
$sql_categorias = "SELECT id_categoria, nombre FROM categoria";
$result_categorias = mysqli_query($conexion, $sql_categorias);
$categorias = mysqli_fetch_all($result_categorias, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if(isset($_SESSION['id_usuario'])) {
        // Check if user is an administrator
        if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador') {
            $id_usuario = $_SESSION['id_usuario'];  

            // Retrieve form data
            $nombre = $_POST['nombre_producto'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $stock = $_POST['stock'];
            $categoria_id = $_POST['categoria'];

            // Handling photo upload
            $Foto = $_FILES['foto_producto']['name'];
            $Foto_temp = $_FILES['foto_producto']['tmp_name'];
            $ruta = "../Libraries/IMG/";

            // Move the photo from the temporary location to the final location
            move_uploaded_file($Foto_temp, $ruta.$Foto);

            // Validate form data
            if($nombre != "" && $precio != "" && $descripcion != "" && $stock != "" && $categoria_id != "" && $Foto != "") {
                // Insert the product into the database
                $sql_insert = "INSERT INTO pr (nombre_producto, precio, descripcion, stock, foto_producto, id_categoria, id_usuario) 
                                VALUES ('$nombre', '$precio', '$descripcion', '$stock', '$Foto', '$categoria_id', '$id_usuario')";
                $result_insert = mysqli_query($conexion, $sql_insert);

                if ($result_insert) {
                    // Redirect the user to a success page or display a success message
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
