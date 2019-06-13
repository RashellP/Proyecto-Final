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
    $resultados2=$conn->query($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/file.png">
    <link rel="stylesheet" type="text/css" href="../css/agregar.css">
    <title>Admin | Pago</title>
</head>
<body>
    <header>
        <div>
            <h1>Admin | Registrar Pago</h1>
        </div>
        <nav>
            <ul>
                <li><a href="HomeCobrador.php">Inicio</a></li>
                <li><a href="cerrar.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <form action="pago.php" method="post" id="Pago">
        <h2>Agregar Pago</h2>
        <label>Seleccione un Telefono:</label>
        <select name="telP" id="telP">
            <option value=0 default>Seleccione...</option>
            <?php 
                while($datos=$resultados->fetch_assoc()){
            ?>
            <option value="<?php echo $datos["id_deudor"]?>"><?php echo $datos["telefono"]?></option>
            <?php 
                }
            ?>
        </select><br>
        <label>Ingrese Cantidad:</label>
        <input type="number" name="cantidadP" id="cantidadP"><br>
        <label>Ingrese Descrición:</label>
        <input type="text" name="descripcionP" id="descripcionP"><br>
        <input type="submit" value="Registrar" name="regPago" id="regPago">
    </form>

    <form action="deudor.php" method="post" id="Deudor">
        <h2>Agregar Deudor</h2>
        <label>Ingrese Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br>
        <label>Ingrese Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos"><br>
        <label>Ingrese Telefono:</label>
        <input type="text" name="tel" id="tel"><br>
        <label>Ingrese Correo:</label>
        <input type="text" name="correo" id="correo"><br>
        <label>Ingrese una Conttraseña:</label>
        <input type="password" name="contra" id="contra"><br>
        <input type="submit" value="Registrar" name="regDeudor" id="regDeudor">
    </form>

    <form action="deuda.php" method="post" id="Deuda">
        <h2>Agregar Deuda</h2>
        <label>Seleccione un Telefono:</label>
        <select name="telD" id="telD">
            <option value=0 default>Seleccione...</option>
            <?php 
                while($datos2=$resultados2->fetch_array()){
            ?>
            <option value="<?php echo $datos2["id_deudor"]?>"><?php echo $datos2["telefono"]?></option>
            <?php 
                }
            ?>
        </select><br>
        <label>Ingrese Cantidad:</label>
        <input type="number" name="cantidadD" id="cantidadP"><br>
        <label>Ingrese una descrición:</label>
        <input type="text" name="descripcionD" id="descripcionD"><br>
        <input type="submit" value="Registrar" name="regDeuda" id="regDeuda">
    </form>
</body>
</html>