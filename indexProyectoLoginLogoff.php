<!DOCTYPE html>
<html lang="es">
    <!--
    Autor: Santiago González Vicente
    Fecha Modificacion: 2026-09-28
    Descripcion: Indice DAW2
    -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/jpg" href="webroot/favicon/favicon.ico">
        <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Santiago González Vicente</title>
    </head>
    <body>
        <header>
            <img scr="http://daw204.local.ieslossauces.es/SGVDWESProyectoDWES/SGVDWESProyectoLogInLoOffgTema5/webroot/images/images.png" alt="Logo"/>
            <h1>UT5: Proyecto LogIn LogOff</h1>
        </header>
        <main>
            <form name="input" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="botones"><input type="submit" name="submit" value="Entrar"/><input type="submit" name="Cancelar" value="Cancelar"/></div>
            </form>
        </main>
        <footer>
            <p><time datetime="2026-09-14">2026-2027</time> IES LOS SAUCES. ©Todos los derechos reservados</p>
            <p>Santiago González Vicente. 14/09/2026</p>
            <a href="https://github.com/CuentaSantiago/SGVDWESProyectoTema5" target="_blank" rel="noopener"><i class="fa fa-github" style="font-size:40px; margin-right: 15px;"></i></a>
            <a href="../indexProyectoDWES.php"><i class="fa fa-home" style="font-size:40px; margin-right: 15px;"></i></a>
        </footer>
    </body>
</html>
<?php
if (isset($_REQUEST['Cancelar'])) {
    header("Location: ./indexProyectoDWES.php");
}
if (isset($_REQUEST['submit'])) {
    header("Location: codigoPHP/Login.php");
}
?>