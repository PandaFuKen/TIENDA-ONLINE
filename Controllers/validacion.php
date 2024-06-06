<?php
include("../PHP/conexion.php");

if(isset($_POST["login"])){
    if(strlen($_POST["usuarios"]) >= 1 && strlen($_POST['pass']) >= 1){ 
        $NombreUsuario = $_POST["usuarios"];
        $Contra = $_POST["pass"];

        //$conexion = mysqli_connect("localhost", "admin", "9683", "chedraui");

        // Verifica si hay errores en la conexión
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$NombreUsuario' AND password='$Contra'");

        // Verifica si hay errores en la consulta
        if (!$consulta) {
            die("Error en la consulta: " . mysqli_error($conexion));
        }

        $detalles = mysqli_fetch_array($consulta);

        if($detalles){
            $_SESSION['usuario'] = $detalles['username'];
            $_SESSION['id_usuario'] = $detalles['id_usuario'];
            $_SESSION['rol'] = $detalles['rol'];
            $_SESSION['loggedin'] = true;

            if($_SESSION['rol'] == '1'){

              header("Location:../Assets/admin.php");

            }
            elseif($_SESSION['rol'] == '2'){
                header("Location: ../index.php");
            }
        }
        else{
            echo "Usuario o contraseña incorrectos";
        }
    }
    else{
        echo "Completa todos los campos";
    }
}
?>
