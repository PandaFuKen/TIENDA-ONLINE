<link rel="stylesheet" href="../Libraries/CSS/tablas.css">

<?php 
include("");
?>


<div class="contenedor-tabla">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    </table>
</div>


<?php
require_once "../config/conexion.php";

if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $precio_rebajado = $_POST['precio_rebajado'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['foto'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $foto = $fecha . ".jpg";
        $destino = "../assets/img/" . $foto;
        $query = mysqli_query($conexion, "INSERT INTO productos(nombre, descripcion, precio_rebajado, cantidad, imagen, id_categoria) VALUES ('$nombre', '$descripcion', '$precio_rebajado', $cantidad, '$foto', $categoria)");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                header('Location: productos.php');
            }
        }
    }
}
<!--
<td><img class="img-thumbnail" src="../assets/img/<?php echo $data['imagen']; ?>" width="50"></td> -->