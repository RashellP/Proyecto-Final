<?php
    include("conexion.php");
    session_start();
    if(!isset($_SESSION["admin"])){
        header("location:../index.html");
    }
    if(($_POST["telP"]==0)OR empty($_POST["cantidadP"])OR empty($_POST["descripcionP"])){
        echo"<h2>Por favor termine de completar el formulario anterior</h2>";
        echo"<a href='Agregar.php'>Regresar a formulario</a>";
    }
    else{
        $cobrador=$_SESSION["admin"];
        $cantidad=$_POST["cantidadP"];
        $descripcion=$_POST["descripcionP"];
        $deudor=$_POST["telP"];

        $admin="SELECT id_cobrador FROM cobrador WHERE telefono='$cobrador'";
        $idAdmin=$conn->query($admin)->fetch_object()->id_cobrador;

        $insert="INSERT INTO movimientos (id_cobrador,id_deudor,cantidad,descripcion,fecha,tipo)
        VALUES ($idAdmin, $deudor, $cantidad,'$descripcion', NOW() ,0)";
        if ($conn->query($insert)===true){
            echo "<h2>El pago ha sido añadido exitosamente!</h2>";
            echo"<a href='Agregar.php'>Regresar a formulario</a>";
        }
        else{
            echo "<h2>Error!</h2>";
            echo"<a href='Agregar.php'>Regresar a formulario</a>";
        }

        //Se hace suma de todas las deudas del deudor
        $Deuda="SELECT SUM(cantidad) deuda FROM movimientos WHERE id_deudor=$deudor AND tipo=1";
        $totalD=$conn->query($Deuda)->fetch_object()->deuda;


        //Se hace suma de todos los pagos del deudor
        $Pago="SELECT SUM(cantidad) pago FROM movimientos WHERE id_deudor=$deudor AND tipo=0";
        $totalP=$conn->query($Pago)->fetch_object()->pago;

        //se hace la resta de los pagos a la deuda
        $deudaTotal=$totalD - $totalP;

        //se inserta la deuda total al deudor
        $Total="UPDATE deudor SET DeudaTotal= $deudaTotal WHERE id_deudor=$deudor";
        $resul=$conn->query($Total);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/pago.css" type="text/css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>