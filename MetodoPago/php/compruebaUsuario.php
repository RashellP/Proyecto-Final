<?php
    try{
        $base = new PDO("mysql: host=localhost;dbname=id9881071_cobranza","id9881071_roman","roman123");
        $base-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM deudor WHERE telefono=:telUsuario AND password=:contraUsuario";
        $resultado=$base->prepare($sql);
        $telefono=htmlentities(addslashes($_POST['telUsuario']));
        $password=htmlentities(addslashes($_POST['contraUsuario']));    
        $resultado->bindValue(":telUsuario",$telefono);
        $resultado->bindValue(":contraUsuario",$password);      
        $resultado-> execute();
        $registro=$resultado->rowCount();
        if($registro==0){
            echo"<h2>Error al ingresar</h2> <a href='user.php'>Volver al login</a>";
        }
        else{
            session_start();
            $_SESSION['user']=$_POST["telUsuario"];
            header("location:HomeDeudor.php");
        }  
    }
    catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/warning.png">
    <link rel="stylesheet" href="../css/compruebaUsuario.css" type="text/css">
    <img src="../img/puffle.png">
    <title>Validar</title>
</head>
<body>
</body>
</html>