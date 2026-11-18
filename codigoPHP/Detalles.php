<?php
session_start();
if (!isset($_SESSION['usuarioDAW2SGVAppLoginLogoff'])) {
    header("Location: Login.php");
    exit;
}
if (isset($_REQUEST['Cancelar'])) {
    header("Location: ./indexProyectoLoginLogoff.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <!--
    Autor: Santiago González Vicente
    Fecha Modificacion: 2026-10-04
    Descripcion: Indice DAW2
    -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Santiago González Vicente</title>
    </head>
    <body>
        <?php
                $aSuperglobales = [
                    '$_SESSION' => $_SESSION,
                    '$_COOKIE' => $_COOKIE,
                    '$_SERVER' => $_SERVER,
                    '$_REQUEST' => $_REQUEST,
                    '$_GET' => $_GET,
                    '$_POST' => $_POST,
                    '$_FILES' => $_FILES,
                    '$_ENV' => $_ENV
                ];

                // Recorrido del array
                foreach ($aSuperglobales as $nombreSuperglobal => $arraySuperglobal) {
                    echo "<h3 class='superGlobal'>$nombreSuperglobal</h3>";

                    if (!empty($arraySuperglobal)) {
                        echo "<ul>";

                        foreach ($arraySuperglobal as $nombre => $contenido) {
                            if (is_array($contenido)) {
                                $contenido = "<pre>" . print_r($contenido, true) . "</pre>";
                            }
                            echo "<li><span style='color:blue;font-weight:bold'>$nombre : </span> $contenido</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<div class='vacio'>La variable $nombreSuperglobal esta vacia en este momento.</div>";
                    }
                }
                phpinfo();
                ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="botones"><input type="submit" name="Cancelar" value="Cancelar"/></div>
        </form> 
        <footer>
            <p><time datetime="2026-09-14">2026-2027</time> IES LOS SAUCES. ©Todos los derechos reservados</p>
            <p>Santiago González Vicente. 14/09/2026</p>
            <a href="https://github.com/CuentaSantiago/SGVTema5ProyectoLogInLogOff"><i class="fa fa-github" style="font-size:40px; margin-right: 15px;"></i></a>
            <a href="https://github.com/CuentaEducaSantiago/SGVDWESProyectoTema3" target="_blank" rel="noopener"><i class="fa fa-github" style="font-size:40px; margin-right: 15px;"></i></a>
            <a href="../../indexProyectoDWES.php"><i class="fa fa-home" style="font-size:40px; margin-right: 15px;"></i></a>
        </footer>
    </body>
</html>