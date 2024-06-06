<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formato de pago</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Rutas de estilos CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Estilos CSS personalizados -->
    <link rel="stylesheet" type="text/css" href="pagos.css"> <!-- Asegúrate de que esta ruta sea correcta -->

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formato de pago</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Libraries/CSS/navbar.css">
</head>

<?php 
include('../Views/config.php'); // Ajusta la ruta según la ubicación de tu archivo
include_once '../Views/navbar.php';
?>

<body>
<center>
    <?php
    include('../PHP/conexion.php');

    if (isset($_GET['total']) && !empty($_GET['total'])) {
        $total = $_GET['total'];

        // Verificar si el usuario ha iniciado sesión
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            $idUsuario = $_SESSION['id_usuario'];

            $query = "SELECT * FROM tarjetasusuario WHERE usuario_id = ?";
            $statement = $conexion->prepare($query);
            $statement->bind_param("i", $idUsuario);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows > 0) {
                // El usuario tiene ubicaciones agregadas, mostrar la lista de ubicaciones
                $query = $conexion->prepare("SELECT token, nombre_titular, fecha_expiracion FROM tarjetasusuario WHERE usuario_id = ?");
                $query->bind_param("i", $idUsuario);
                $query->execute();
                $tarjetaResult = $query->get_result();
                $tarjeta = $tarjetaResult->fetch_assoc();
                $contador = 0;

                // Mostrar las ubicaciones en divs separados
                if ($tarjeta) { 
                    $contador++;
                    ?>
                    <center>
                        <div><h1 class="">Selecciona una tarjeta para realizar el pago</h1></div>
                        <form method="post" action="validacionPago.php" name="pagos-form">
                            <div class="tarjeta">
                                <h1 class="BBVA">BBVA</h1>
                                <img class="chip" src="../images/Tarjeta/chip.jpg" alt="">
                                <h1 class="numero" id="cardNumber"><?php echo $tarjeta['token']; ?></h1>
                                <h1 class="txtValida">VÁLIDA HASTA</h1> <h1 class="date"><?php echo $tarjeta['fecha_expiracion']; ?></h1>
                                <h1 class="propietario"><?php echo $tarjeta['nombre_titular']; ?></h1>
                                <img class="visa" src="../images/Tarjeta/visa.png" alt="">
                            </div>
                            <div style="margin: 5px;">
                                <input type="checkbox" id="ter/cond" name="ter&cond" value="ter&cond" required>
                                <label class="terminos"> Tarjeta <?php echo $contador; ?>.</label>
                            </div>
                        </center>
                        <button type="submit" class="btn">Pagar</button>
                        </form>
                    <?php
                }
            } else {
                ?>
                <div class="wrapper">
                    <div class="payment">
                        <form method="post" action="addTarjeta.php" name="location-form">
                            <div class="form">
                                <div class="card space icon-relative">
                                    <label class="label">Nombre del Propietario:</label>
                                    <input type="text" name="nombre_titular" class="input" placeholder="Nombre" required>
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="card space icon-relative">
                                    <label class="label">Numero de tarjeta:</label>
                                    <input type="text" name="numero_tarjeta" class="input" id="cardNumber" placeholder="Numero de tarjeta" maxlength="19" required>
                                    <i class="far fa-credit-card"></i>
                                </div>
                                <div class="card-grp space">
                                    <div class="card-item icon-relative">
                                        <label class="label">Fecha expiración:</label>
                                        <input type="text" name="fecha_expiracion" id="expiryDate" class="input" placeholder="00 / 00" maxlength="5" required>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="card-item icon-relative">
                                        <label class="label">CVC:</label>
                                        <input type="text" class="input" data-mask="000" placeholder="000" required>
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn" onClick="window.location.href='pagos.php?total=<?php echo $total; ?>'">Agregar tarjeta</button>
                            </div>
                        </form>
                    </div>
                </div>
                </center>
                <?php
            }
        } else {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            header('Location: ../login_Signup/login.html');
            exit;
        }
    } else {
        header('Location: ../index.php');
        exit;
    }
    ?>
</center>


<script type="text/javascript">
// FORMATO PARA EL VENCIMIENTO DE LA TARJETA
document.getElementById('cardNumber').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove all non-digit characters
    let formattedValue = value.match(/.{1,4}/g)?.join(' ') || ''; // Group in sets of 4 digits
    e.target.value = formattedValue;
});

document.getElementById('expiryDate').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove all non-digit characters
    if (value.length > 4) value = value.slice(0, 4); // Ensure max length is 4 digits
    let formattedValue = value.match(/.{1,2}/g)?.join('/') || value; // Format MM/YY
    e.target.value = formattedValue;
});
</script>

</body>
</html>
