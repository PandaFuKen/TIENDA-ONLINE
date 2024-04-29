<link rel="stylesheet" href="../Libraries/CSS/add.css">

<?php
include("../php/conexion.php");
$sql = "SELECT*FROM categoria";
$result = mysqli_query($conexion,$sql);
?>






<div class="cuerpo">

<div class="contenedor-tabla">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = mysqli_fetch_array($result)) {?> 
                <tr>
                <td><?php echo $fila['id_categoria']?></td>
                <td><?php echo $fila['nombre']?></td>
                <td>
                    <a href="../Controllers/?id_usuario=<?php echo $fila ['id_usuario']?>"><img src="../Libraries/IMG/editar.png" alt="" class="editar"></a>
                    <a href="../Controllers/eliminarcategoria?id_categoria=<?php echo $fila ['id_categoria']?>"><img src="../Libraries/IMG/eliminar.png" alt="" class="eliminar"></a>
                </td>
                </tr>
          <?php }?>
        </tbody>
    </table>
</div>

</div>