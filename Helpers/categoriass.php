<?php 
include ("../php/conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Categorias = $_POST['nombre'];

 
    
    if($Categorias != "" ) {
        $sql_insert = "INSERT INTO categoria (nombre) VALUES ('$Categorias')";
        $result_insert = mysqli_query($conexion, $sql_insert);
        
        if ($result_insert) {
            // Redireccionar al usuario a la misma página después de procesar el formulario
            header("Location: {$_SERVER['REQUEST_URI']}");
            exit();
        } else {
            echo "Error al agregar usuario: " . mysqli_error($conexion);
        }
    } else {
        echo "Por favor, complete todos los campos del formulario";
    }
}
?>

<link rel="stylesheet" href="../Libraries/CSS/registros.css">

<div class="contenedor-sticky">
    <form method="post" class="box" >
        <h1 class="Inicio">Ingresa la categoria</h1>
         <label for="">Nombre de la categoria:</label>
        <input type="text" name="nombre" class="Ingreso">
        <input type="submit" value="Agregar" id="registrar">
    </form>
</div>


