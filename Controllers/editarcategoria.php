<link rel="stylesheet" href="../Libraries/CSS/editarusers.css">

<?php
include("../php/conexion.php");
$id2=$_GET['id_usuario'];
$sql="SELECT*FROM usuarios where id_usuario='".$id2."'";
$result=mysqli_query($conexion,$sql);

while($fila=mysqli_fetch_assoc($result)){

?>
<div class="contenedor-sticky">
    <form method="post" class="box">
        <h1 class="Inicio">PERFIL</h1>
       <input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario']?>">
       <label for="">Nombres</label>
        <input type="text" name="nombres" placeholder="" class="Ingreso" value="<?php echo $fila['Nombres']?>">
        <label for="">Apellidos</label>
        <input type="text" name="apellidos" placeholder="" class="Ingreso" value="<?php echo $fila['Apellidos']?>">
        <label for="">Correo</label>
        <input type="text" name="correo" placeholder="" class="Ingreso" value="<?php echo $fila['Correo']?>">
        <label for="">nombre de usuario</label>
        <input type="text" name="username" placeholder="" class="Ingreso" value="<?php echo $fila['username']?>">
        <label for="">Contraseña</label>
        <input type="text" name="password" placeholder="" class="Ingreso" value="<?php echo $fila['password']?>">
        <input type="submit" value="Agregar" id="registrar">
    </form>
    <?php } ?>
</div>

<?php 
include("../php/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un ID de maestro
    if(isset($_POST['id_usuario'])) {
        $id_usuario = $_POST['id_usuario'];
        $Nombres = $_POST['nombres'];
        $Apellidos = $_POST['apellidos'];
        $Correo = $_POST['correo'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        
        if($Nombres != "" && $Apellidos != "" && $Correo != "" && $Username != "" && $Password != "" ) {
            // Construir la consulta de actualización
            $sql_update = "UPDATE usuarios SET Nombres='$Nombres', Apellidos='$Apellidos', Correo='$Correo' , username='$Username' , password='$Password' WHERE id_usuario=$id_usuario";
            $result_update = mysqli_query($conexion, $sql_update);
            
            if ($result_update) {
                // Redireccionar al usuario a la misma página después de procesar el formulario
                header("Location:../Assets/Admin.php");
                exit();
            } else {
                echo "Error al actualizar usuario: " . mysqli_error($conexion);
            }
        } else {
            echo "Por favor, complete todos los campos del formulario";
        }
    } else {
        echo "No se proporcionó un ID de maestro para la actualización";
    }
}
?>




