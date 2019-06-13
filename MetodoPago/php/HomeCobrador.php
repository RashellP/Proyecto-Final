<?php
    session_start();
    if(!isset($_SESSION["admin"])){
        header("location:../index.html");
    }
    $cobrador=$_SESSION["admin"];
    include("conexion.php");
    $admin="SELECT id_cobrador FROM cobrador WHERE telefono='$cobrador'";
    $idAdmin= $conn->query($admin)->fetch_object()->id_cobrador;
    $consulta="SELECT * FROM deudor where id_cobrador=$idAdmin";
    $resultados=$conn->query($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/admin.png">
    <link rel="stylesheet" href="../css/homeCobrador.css" type="text/css">
    <title>Admin| Inicio</title>
</head>
<body>
    <header>
        <div>
            <h1>Admin | Inicio</h1>
        </div>
        <nav>
            <ul>
                <li><a href="Agregar.php">Agregar</a></li>
                <li><a href="cerrar.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <form action="tablaCobrador.php" method="post">
        <select name="tel" id="tel">
            <option value=0 default>Seleccione un telefóno</option>
            <?php 
                while($datos=$resultados->fetch_assoc()){
            ?>
            <option value="<?php echo $datos["id_deudor"]?>"><?php echo $datos["telefono"]?></option>
            <?php 
                }
            ?>
        </select><br>   
        <select name="mes" id="fecha">
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
        </select><br>
        <div id="tipo">Seleccione el tipo de movimiento:</div>
        <input type="radio" value=0 id="pagos" name="mov">Pagos<br>
        <input type="radio" value=1 id="deudas" name="mov">Deudas<br>
        <input type="radio" value="2" id="ambos" name="mov">Ambos<br>
        <input type="submit" value="Mostrar" id="mostrar" name="mostrar">
    </form>
</body>
</html>