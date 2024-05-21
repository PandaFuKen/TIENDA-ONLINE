<?php
session_start();
session_destroy();
include("../Controllers/validacion.php");
include_once("../Views/navbar.php");
?>

<link rel="stylesheet" href="../Libraries/login.css">

<form action="" class="box" method="post">
    <h1>Inicia Sesión</h1>
    <label for="" class="ingreso">Ingresa tu nombre usuario</label>
    <input type="text" name="usuarios" placeholder="">
    <label for="" class="Ingreso">Ingresa tu contraseña</label>
    <input type="password" name="pass" placeholder="">
    <input type="submit" name="login" value="Login">
</form>
