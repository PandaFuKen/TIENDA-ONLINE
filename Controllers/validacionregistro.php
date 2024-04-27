<?php 
if(isset($_POST["registro"])){ // Botón para validar el método de registro
    if(strlen($_POST["usuarios"]) >= 1 && strlen($_POST['pass']) >= 1){ // Valida el usuario y la contraseña
        $NombreUsuario = $_POST["usuarios"];
        $Contra = $_POST["pass"];

        // Verifica si es el primer usuario registrado (administrador)
        $consulta_admin = mysqli_query($conexion, "SELECT * FROM usuarios");
        $num_admin = mysqli_num_rows($consulta_admin);
        $cargo = ($num_admin == 0) ? 'Administrador' : 'Cliente';

        // Inserta el nuevo usuario en la base de datos
        $insertar_usuario = mysqli_query($conexion, "INSERT INTO usuarios (username, password, cargo) VALUES ('$NombreUsuario', '$Contra', '$cargo')");
        
        if($insertar_usuario){
            echo "Usuario registrado exitosamente.";
        }
        else{
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
    }
    else{
        echo "Completa los campos.";
    }
}

?>