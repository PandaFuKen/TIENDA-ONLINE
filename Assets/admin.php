<link rel="stylesheet" href="../Libraries/CSS/admin.css">


<script src="../Config/login.js"></script>
<?php
session_start();
if (isset($_SESSION['rol']) == 'Administrador') {
?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Perfil')" id="defaultOpen">Perfil</button>
  <button class="tablinks" onclick="openCity(event, 'Cliente')">Cliente</button>
  <button class="tablinks" onclick="openCity(event, 'Categoria')">Categoria</button>
  <button class="tablinks" onclick="openCity(event, 'Producto')">Producto</button>
  <a href="../Assets/exit.php"><button class="tablinks">Cerrar sesion</button></a>

</div>

<div id="Perfil" class="tabcontent">
  
</div>

<div id="Cliente" class="tabcontent">
  <?php include ("../Tablas/users.php");?>
</div>

<div id="Categoria" class="tabcontent">
<button  class="registro-boton" ><a href="../Helpers/categoriass.php" class="ingreso">Agregar</a></button>
<h1 class="seccion">Categoria</h1>
  <?php include ("../Tablas/categorias.php");?>
</div>

<div id="Producto" class="tabcontent">
  <h3>Productos</h3>
  
  
</div>


        
<script src="../Config/admin.js"></script>
<script src="../Config/boton.js"></script>
        

<?php }
else{
 header("Location: ../Assets/login.php");
}
?>