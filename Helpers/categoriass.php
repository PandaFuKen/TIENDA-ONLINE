<?php
// Incluir el archivo de conexión a la base de datos
include("../php/conexion.php");

// Verificar si se ha enviado el formulario por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de la categoría
    $categoria = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    
    // Verificar si se ha subido una imagen
    if (isset($_FILES['foto_categoria']) && $_FILES['foto_categoria']['error'] === UPLOAD_ERR_OK) {
        // Directorio de almacenamiento de imágenes
        $ruta = "../Libraries/IMG/";
        
        // Obtener el nombre y la ubicación temporal de la imagen
        $foto = $_FILES['foto_categoria']['name'];
        $foto_temp = $_FILES['foto_categoria']['tmp_name'];

        // Mover la imagen al directorio de destino
        if (move_uploaded_file($foto_temp, $ruta . $foto)) {
            // Consulta preparada para insertar la categoría en la base de datos
            $sql_insert = "INSERT INTO categoria (nombre, foto_categoria) VALUES (?, ?)";
            
            // Preparar la consulta
            $stmt = mysqli_prepare($conexion, $sql_insert);
            if ($stmt) {
                // Vincular los parámetros
                mysqli_stmt_bind_param($stmt, "ss", $categoria, $foto);
                
                // Ejecutar la consulta
                if (mysqli_stmt_execute($stmt)) {
                    // Redireccionar al usuario después de procesar el formulario
                    header("Location: ../Assets/admin.php");
                    exit();
                } else {
                    echo "Error al agregar categoría: " . mysqli_error($conexion);
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Por favor, seleccione una imagen.";
    }
}
?>

<link rel="stylesheet" href="../Libraries/CSS/registros.css">

<div class="contenedor-sticky">
    <form method="post" class="box" enctype="multipart/form-data">
        <h1 class="Inicio">Ingresa la categoría</h1>
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" name="nombre" class="Ingreso">
        <label for="foto_categoria">Ingresar una foto de la categoría:</label>
        <input type="file" name="foto_categoria">
        <input type="submit" value="Agregar" id="registrar">
    </form>
</div>
