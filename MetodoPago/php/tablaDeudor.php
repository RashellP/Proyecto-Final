<?php
    include("conexion.php");
    session_start();
    if(!isset($_SESSION["user"])){
        header("location:../index.html");
    }
    $mov=$_POST["mov"];
    $usuario=$_SESSION["user"];
    $user="SELECT id_deudor FROM deudor WHERE telefono='$usuario'";
    $idU=$conn->query($user)->fetch_object()->id_deudor;
    $mes=$_POST["mes"];
    $mov1="";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/table.png">
    <link rel="stylesheet" type="text/css" href="../css/tablaDeudor.css">
    <title>Tablas</title>
</head>
<body>
    <a href="HomeDeudor.php">Regresar a Inicio</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Id Vendedor</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Tipo</th>
        </tr>
        <?PHP
            switch($mov){
                case 0:
                    if($mes!="0"){
                        $resultados2="SELECT * FROM movimientos WHERE id_deudor=$idU AND tipo=0 AND fecha LIKE '$mes'";
                        $consulta2 = $conn->query($resultados2);
                        while($datos2=$consulta2->fetch_array()){
                            echo "<tr><td>".$datos2['id_deudor']."</td>";
                            echo "<td>".$datos2['id_cobrador']."</td>";
                            echo "<td>".$datos2['cantidad']."</td>";
                            echo "<td>".$datos2['descripcion']."</td>";
                            echo "<td>".$datos2['fecha']."</td>";
                            echo "<td>Pago</td></tr>";
                        }
                    }
                    else{
                        $resultados="SELECT * FROM movimientos WHERE id_deudor=$idU AND tipo=0";
                        $consulta = $conn->query($resultados);
                        while($datos=$consulta->fetch_array()){
                            echo "<tr><td>".$datos['id_deudor']."</td>";
                            echo "<td>".$datos['id_cobrador']."</td>";
                            echo "<td>".$datos['cantidad']."</td>";
                            echo "<td>".$datos['descripcion']."</td>";
                            echo "<td>".$datos['fecha']."</td>";
                            echo "<td>Pago</td></tr>";
                        }
                    }
                    break;
                case 1:
                    if($mes!="0"){
                        $resultados4="SELECT * FROM movimientos WHERE id_deudor=$idU AND tipo=1 AND fecha LIKE '$mes'";
                        $consulta4 = $conn->query($resultados4);
                        while($datos4=$consulta4->fetch_array()){
                            echo "<tr><td>".$datos4['id_deudor']."</td>";
                            echo "<td>".$datos4['id_cobrador']."</td>";
                            echo "<td>".$datos4['cantidad']."</td>";
                            echo "<td>".$datos4['descripcion']."</td>";
                            echo "<td>".$datos4['fecha']."</td>";
                            echo "<td>Deuda</td></tr>";
                        }
                    }
                    else{
                        $resultados3="SELECT * FROM movimientos WHERE id_deudor=$idU AND tipo=1";
                        $consulta3 = $conn->query($resultados3);
                        while($datos3=$consulta3->fetch_array()){
                            echo "<tr><td>".$datos3['id_deudor']."</td>";
                            echo "<td>".$datos3['id_cobrador']."</td>";
                            echo "<td>".$datos3['cantidad']."</td>";
                            echo "<td>".$datos3['descripcion']."</td>";
                            echo "<td>".$datos3['fecha']."</td>";
                            echo "<td>Deuda</td></tr>";
                        }
                    }
                    break;
                case 2:
                    if($mes!="0"){
                        $resultados6="SELECT * FROM movimientos WHERE id_deudor=$idU AND fecha LIKE '$mes'";
                        $consulta6 = $conn->query($resultados6);
                        while($datos6=$consulta6->fetch_array()){
                            if($datos6['tipo']==0){
                                $mov1="Pago";
                            }     
                            else{
                                $mov1="Deuda";
                            }  
                            echo "<tr><td>".$datos6['id_deudor']."</td>";
                            echo "<td>".$datos6['id_cobrador']."</td>";
                            echo "<td>".$datos6['cantidad']."</td>";
                            echo "<td>".$datos6['descripcion']."</td>";
                            echo "<td>".$datos6['fecha']."</td>";
                            echo "<td>".$mov1."</td>";
                        }
                    }
                    else{
                        $resultados5="SELECT * FROM movimientos WHERE id_deudor=$idU";
                        $consulta5 = $conn->query($resultados5);
                        while($datos5=$consulta5->fetch_array()){    
                            if($datos5['tipo']==0){
                                $mov1="Pago";
                            }     
                            else{
                                $mov1="Deuda";
                            }                
                            echo "<tr><td>".$datos5['id_deudor']."</td>";
                            echo "<td>".$datos5['id_cobrador']."</td>";
                            echo "<td>".$datos5['cantidad']."</td>";
                            echo "<td>".$datos5['descripcion']."</td>";
                            echo "<td>".$datos5['fecha']."</td>";
                            echo "<td>".$mov1."</td></tr>";
                        }
                    }
                    break;
            }
        ?>
    </table>
</body>
</html>