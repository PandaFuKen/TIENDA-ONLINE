<link rel="stylesheet" href="../Libraries/CSS/tablas.css">

<?php 
include("../PHP/conexion.php");
$sql = "SELECT*FROM pr";
$result = mysqli_query($conexion,$sql);

?>


<div class="contenedor-tabla">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>FOTO</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        <?php while($fila = mysqli_fetch_array($result)) {?>
           <tr>
            <td><?php echo $fila['id_producto']?></td>
            <td><?php echo $fila['foto_producto']?></td>
            <td><?php echo $fila['nombre_producto']?></td>
            <td><?php echo $fila['precio']?></td>
            <td><?php echo $fila['descripcion']?></td>
            <td><?php echo $fila['stock']?></td>
            <td>
                <a href="../Controllers/editarproducto.php?id_producto=<?php echo $fila ['id_producto']?>"><img src="../Libraries/IMG/editar.png" alt=""></a>
                <a href="../Controllers/editarproducto.php?id_producto=<?php echo $fila ['id_producto']?>"><img src="../Libraries/IMG/eliminar.png" alt=""></a>
            </td>
           </tr>
 

          <?php } ?>
        </tbody>
    </table>
</div>


