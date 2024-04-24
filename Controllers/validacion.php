<?php

if(isset($_POST["login"])){ // Botón para validar el método login
    if(strlen($_POST["usuarios"]) >= 1 && strlen($_POST['pass']) >= 1){ // Valida el usuario y la contraseña
        $NombreUsuario = $_POST["usuarios"];
        $Contra = $_POST["pass"];

        $conexion = mysqli_connect("localhost", "root", "", "chedraui");
        $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$NombreUsuario' AND password='$Contra'");
        $detalles = mysqli_fetch_array($consulta);
        
        if($detalles){
          session_start();
          $_SESSION['usuario'] = $detalles['username'];
          $_SESSION['cargo'] = $detalles['cargo'];

         if($_SESSION['cargo'] == 'Administrador'){ 
          header("Location: ../Assets/admin.php");
         }
         if($_SESSION['cargo'] == 'Cliente'){
          echo 'Este es un cliente ';
         }
      
        }
        else{
          echo"usuario no existe";
        }
      
    }
    else{
      echo"COMPLETA LOS CAMPOS";
    }
}
?>