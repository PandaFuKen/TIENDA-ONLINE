<?php 
include ("../php/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombres = $_POST['nombres'];
    $Apellidos = $_POST['apellidos'];
    $Correo = $_POST['correo'];
    $Semestre = $_POST['semestre'];
    $Carrera = $_POST['carrera'];

    
    
    if($Nombres != "" && $Apellidos != "" && $Correo != "" && $Semestre != "" && $Carrera) {
        $sql_insert = "INSERT INTO Alumnos (Nombres, Apellidos, Correo , Semestre , Carrera) VALUES ('$Nombres', '$Apellidos', '$Correo' ,'$Semestre' ,'$Carrera')";
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

<form action="" class="box" method="post">
        <h1>Registrate</h1>
        <label for="" class="ingreso">Ingresa tus nombres</label>
        <input type="text" name="nombres" placeholder="">
        <label for="" class="Ingreso">Ingresa tus apellidos</label>
        <input type="text" name="apellidos" placeholder="">
        <label for="" class="Ingreso">Ingresa tu correo</label>
        <input type="text" name="correo" placeholder="">
        <label for="" class="Ingreso">Ingresa un nombre de usuario</label>
        <input type="text" name="username" placeholder="">
        <label for="" class="Ingreso">Ingresa una contraseña</label>
        <input type="password" name="password" placeholder="">
        <input type="submit" name="" value="Registrate">
    </form>
