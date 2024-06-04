<link rel="stylesheet" href="../Libraries/CSS/tablas.css">

<?php 
include("../php/conexion.php");
$sql = "SELECT*FROM producto";
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($fila = mysqli_fetch_array($result)) {?>
           <tr>
            <td><?php echo $fila['id_producto']?></td>
            <td><img src="../Libraries/IMG/<?php echo $fila['foto_producto']; ?>" alt="" class="editar"></td>
            <td><?php echo $fila['nombre_producto']?></td>
            <td><?php echo $fila['precio']?></td>
            <td><?php echo $fila['descripcion']?></td>
            <td><?php echo $fila['stock']?></td>
            <td>
                <a href="../Controllers/editarproducto.php?id_producto=<?php echo $fila ['id_producto']?>"><img src="../Libraries/IMG/editar.png" alt="" class="editar"></a>
                <a href="../Controllers/eliminarproducto.php?id_producto=<?php echo $fila ['id_producto']?>"><img src="../Libraries/IMG/eliminar.png" alt="" class="eliminar"></a>
            </td>
           </tr>
 

          <?php } ?>
        </tbody>
    </table>
</div>


