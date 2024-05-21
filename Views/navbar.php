<link rel="stylesheet" href="./Libraries/CSS/navbar.css">

<script src="../Config/login.js"></script>
<?php
    session_start();

    if(isset($_SESSION['usuario'])) {
        $username = $_SESSION['usuario'];
?>

<div class="menu">
    <nav class="contenedor-nav">
      <div id="nameUser"><?php echo $username; ?></div>
      <div id="imgUser"><img id="imgUser" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.qR0GP0edU8z3CIOxMTAnzAHaHa%26pid%3DApi&f=1&ipt=077530002660988fd9d0911f179d49e305d04c4d0b17658c45501f935c2447ee&ipo=images" alt=""></div>
    </nav>
<?php } else { ?>
    <nav class="contenedor-nav">
      <a href="./Assets/register.php" class="ref">Registrarse</a>
      <a href="./Assets/login.php" class="ref">Inicia Sesion</a>
    </nav>
        <?php } ?>
<style type="text/css">

#imgUser{
    border-radius: 50px;
    top:2px;
    display: block;
    width: 30px;
    height: 30px;
    position: relative;
    margin: 3px;
    cursor: pointer;
    float:right;
  }

  #nameUser{
    justify-content:center;
    align-items:center;
    font-size: 18px;
    position: relative;
    display: block;
    margin: auto;
    cursor: pointer;
    width: 100px;
    top:14px;
    height:50px;
    float:right;
    margin-right: 10px;
  }

</style>