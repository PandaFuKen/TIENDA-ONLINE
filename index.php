<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Libraries/CSS/index.css">
    <link rel="shortcut icon" href="favicon.ico">

    <title>CHEDRAUI</title>
</head>
<body>

<?php include ("./Views/navbar.php");
//session_destroy();
?>

<h1 class="bienvenido">BIENVENIDO A CHEDRAUI</h1>

<div class="slide">
            <div class="slide-inner">
                <input class="slide-open" type="radio" id="slide-1"
                      name="slide" aria-hidden="true" hidden="" checked="checked">
                <div class="slide-item">
                <img src="./img\ofertas\oferta1.png" alt="">
                </div>
                <input class="slide-open" type="radio" id="slide-2"
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                <img src="./img\ofertas\oferta2.png" alt="">
                </div>
                <input class="slide-open" type="radio" id="slide-3"
                      name="slide" aria-hidden="true" hidden="">
                <div class="slide-item">
                <img src="./img\ofertas\oferta3.png" alt="">
                </div>
                <label for="slide-3" class="slide-control prev control-1">‹</label>
                <label for="slide-2" class="slide-control next control-1">›</label>
                <label for="slide-1" class="slide-control prev control-2">‹</label>
                <label for="slide-3" class="slide-control next control-2">›</label>
                <label for="slide-2" class="slide-control prev control-3">‹</label>
                <label for="slide-1" class="slide-control next control-3">›</label>
            </div>
        </div>

<?php include ("./Views/vistacategoria.php");?>


<?php include ("../TIENDA-ONLINE/Views/shows.php");?>

<style type="text/css">

.slide {
    border-radius:5px;
    margin:auto;
    position: relative;
    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
    margin-top: 1px;
    width: 500px;
    height: 300px;
    background-color:rgb(255, 255, 255);
}
.slide-inner {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: calc( 300px + 3em);
}
.slide-open:checked + .slide-item {
    position: static;
    opacity: 100;
}
.slide-item {
    position: absolute;
    opacity: 0;
    -webkit-transition: opacity 0.6s ease-out;
    transition: opacity 0.6s ease-out;
}
.slide-item img {
    border-radius:5px;
    display: block;
    width: 650px;
    height: 300px;
    max-width: 500px;
}
.slide-control {
    background: rgba(0, 0, 0, 0.60);
    border-radius: 10px;
    color: #fff;
    cursor: pointer;
    display: none;
    font-size: 40px;
    height: 40px;
    line-height: 35px;
    position: absolute;
    transform: translate(0, -100%);
    text-align: center;
    width: 50px;
    z-index: 10;
    -webkit-transform: translate(0, -100%);
    -moz-transform: translate(0, -100%);
    -ms-transform: translate(0, -100%);
    -o-transform: translate(0, -100%);
}
.slide-control.prev {
    left: 0%;
}
.slide-control.next {
    right: 0%;
}

#slide-1:checked ~ .control-1,
#slide-2:checked ~ .control-2,
#slide-3:checked ~ .control-3 {
    display: block;
}

</style>

</html>