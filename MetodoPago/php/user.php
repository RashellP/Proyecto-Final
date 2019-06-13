<!DOCTYPE html>
<html lang="es">
    <link rel="icon" type="image/png" href="" />        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="../img/gamer.png">
        <link rel="stylesheet" type="text/css" href="../css/user.css">
        <title>Pagos</title>
    </head>
    <body>
    <h1><a href="../index.html">Gamer Land</a></h1>
        <div>
            <h2>Usuario | Inicio de Sesión</h2>
            <form action="compruebaUsuario.php" method="post">
                <label id="tel">Telefóno:</label>
                <input type="number" name="telUsuario" id="telUsuario"><br>
                <label id="pass">Contraseña: </label>
                <input type="password" name="contraUsuario" id="contraUsuario"><br>
                <input id="boton" type="submit" value="Iniciar Sesión" name="ingresarUsuario" id="ingresarUsuario">
            </form>
        </div>
    </body>
</html>