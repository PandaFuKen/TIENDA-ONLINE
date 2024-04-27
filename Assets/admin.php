<link rel="stylesheet" href="../Libraries/CSS/admin.css">


<script src="../Config/login.js"></script>
<?php
session_start();
if (isset($_SESSION['rol']) == 'Administrador') {
?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Perfil')" id="defaultOpen">Perfil</button>
  <button class="tablinks" onclick="openCity(event, 'Cliente')">Cliente</button>
  <button class="tablinks" onclick="openCity(event, 'Producto')">Producto</button>
  <a href="../Assets/exit.php"><button class="tablinks">Cerrar sesion</button></a>

</div>

<div id="Perfil" class="tabcontent">
  
</div>

<div id="Cliente" class="tabcontent">
  <?php include ("../Tablas/users.php");?>
</div>

<div id="Producto" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

        
<script src="../Config/admin.js"></script>
        

<?php }
else{
 header("Location: ../Assets/login.php");
}
?>