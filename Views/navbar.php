<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./Libraries/CSS/navbar.css">

<script src="../Config/login.js"></script>


<nav class="contenedor-nav">

  <img class="logoIcono" src="./img/CHEDRAUI_Logo_.png">
  <h1 class="name">CHEDRAUI</h1>

<?php
/*Agrega el nombre de usuario y la foto de perfil */
    session_start();
    if(isset($_SESSION['usuario'])) {
        $username = $_SESSION['usuario'];
?>
      <div id="nameUser"><?php echo $username; ?></div>
      <div id="imgUser"><img id="imgUser" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.qR0GP0edU8z3CIOxMTAnzAHaHa%26pid%3DApi&f=1&ipt=077530002660988fd9d0911f179d49e305d04c4d0b17658c45501f935c2447ee&ipo=images" alt=""></div>
<?php } else { ?>

      <a href="./Assets/register.php" class="ref">Registrarse</a>
      <a href="./Assets/login.php" class="ref">Inicia Sesion</a>

        <?php } ?>

        <a href="./Assets/login.php" class="ref">Ver Carrito</a>
        
      </nav>
<style type="text/css">

    .logoIcono{
          float: left;
          width: 70px;
          height: 70px;
          margin-right: 10px; /* Ajusta el margen entre el logotipo y el nombre */
          border-radio:;border-radius: 10px;
        }

        .name{
          position: relative;
          text-align: left;
          margin-top: 17px;
          color: #0D47A1;
          font-size:25px;
          width: 200px;
          height: 20px;
          display: inline-block; /* Hace que los elementos se muestren en línea */
          vertical-align: middle; /* Alinea verticalmente los elementos */
        }

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