<?php 
include ("../php/conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombres = $_POST['nombres'];
    $Apellidos = $_POST['apellidos'];
    $Correo = $_POST['correo'];
    $Username = $_POST['username'];
    $Password= $_POST['password'];

    
    
    if($Nombres != "" && $Apellidos != "" && $Correo != "" && $Username != "" && $Password) {
        $sql_insert = "INSERT INTO usuarios (Nombres, Apellidos, Correo , username , password,rol) VALUES ('$Nombres', '$Apellidos', '$Correo' ,'$Username' ,'$Password',2)";
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
    <form method="post" class="box">
        <h1 class="Inicio">Registro</h1>
         <label for="">Ingresa tus nombres :</label>
        <input type="text" name="nombres" class="Ingreso">
        <label for="">Ingresa tus apelidos</label>
        <input type="text" name="apellidos" placeholder="Apellidos" class="Ingreso">
        <label for="">Ingresa tu correo</label>
        <input type="email" name="correo" placeholder="Correo" class="Ingreso">
         <label for="">Ingresa un nombre usuario</label>
        <input type="text" name="username" placeholder="username" class="Ingreso">
        <label for="">ingresa una contraseña</label>
        <input type="password" name="password" placeholder="password" class="Ingreso">
        <input type="submit" value="Agregar" id="registrar">
    </form>
</div>


