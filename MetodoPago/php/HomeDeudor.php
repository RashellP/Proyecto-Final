<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("location:../index.html");
    }
    include("conexion.php");
    $tel=$_SESSION["user"];
    $Deuda ="SELECT DeudaTotal FROM deudor WHERE telefono='$tel'";
    $consulta=$conn->query($Deuda)->fetch_object()->DeudaTotal;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/team.png">
    <link rel="stylesheet" href="../css/homeDeudor.css" type="text/css">
    <title>Usuario| Inicio</title>
</head>
<body>
    <header>
        <div>
            <h1>Usuario | Inicio</h1>
        </div>
        <nav>
            <ul>
                <li><a href="cerrar.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <form action="tablaDeudor.php" method="post">
        <select name="mes" id="fecha" class="select">
        <option value="0">Seleccione un mes</option>
        <option value="%-01-%">Enero</option>
        <option value="%-02-%">Febrero</option>
        <option value="%-03-%">Marzo</option>
        <option value="%-04-%">Abril</option>
        <option value="%-05-%">Mayo</option>
        <option value="%-06-%">Junio</option>
        <option value="%-07-%">Julio</option>
        <option value="%-08-%">Agosto</option>
        <option value="%-09-%">Septiembre</option>
        <option value="%-10-%">Octubre</option>
        <option value="%-11-%">Noviembre</option>
        <option value="%-12-%">Diciembre</option>
        </select>
        <div id="tipo">Seleccione el tipo de movimiento:</div>
        <input type="radio" value="0" id="pagos" name="mov">Pagos<br>
        <input type="radio" value="1" id="deudas" name="mov">Deudas<br>
        <input type="radio" value="2" id="ambos" name="mov">Ambos<br>
        <input type="submit" value="Mostrar" id="mostrar" name="mostrar">
        <p class="deuda">Tu Deuda pendiente es: $ <?php echo $consulta; ?></p>
    </form>
</body>
</html>