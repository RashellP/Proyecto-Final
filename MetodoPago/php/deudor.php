<?php
    include("conexion.php");
    session_start();
    if(!isset($_SESSION["admin"])){
        header("location:../index.html");
    }
    
    if(empty($_POST["nombre"])OR empty($_POST["apellidos"])OR empty($_POST["tel"])OR 
    empty($_POST["correo"])OR empty($_POST["contra"])){
        echo"<h2>Por favor termine de completar el formulario anterior</h2>";
        echo"<a href='Agregar.php'>Regresar a formulario</a>";
    }
    else{ 
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $telefono=$_POST["tel"];
        $correo=$_POST["correo"];
        $password=$_POST["contra"];
        $cobrador=$_SESSION["admin"];

        $verificar="SELECT * FROM deudor WHERE telefono='$telefono'";
        $consulta=$conn->query($verificar);
        if(mysqli_num_rows($consulta)>=1){
            echo"<h1>El numero que usted ingreso ya esta registrado, favor de ingresar otro</h1>";
            echo"<a href='Agregar.php'>Regresar a formulario</a>";
        }
        else{
            $admin="SELECT id_cobrador FROM cobrador WHERE telefono='$cobrador'";
            $idAdmin=$conn->query($admin)->fetch_object()->id_cobrador;
            $insert="INSERT INTO deudor (nombre,apellidos,telefono,email,password,id_cobrador,deudaTotal) 
            VALUES ('$nombre','$apellidos','$telefono','$correo','$password',$idAdmin,0)";
            if ($conn->query($insert)===true) {
                echo "<h2>El usuario ha sido añadido exitosamente!</h2>";
                echo"<a href='Agregar.php'>Regresar a formulario</a>";
            } else {
                echo "<h2>Error al Ingresar el formualario</h2>";
                echo"<a href='Agregar.php'>Regresar a formulario</a>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/deudor.css" type="text/css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>