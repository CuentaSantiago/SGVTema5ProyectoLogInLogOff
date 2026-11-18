<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Pefil</title>
        <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">
        <link rel="shortcut icon" type="image/jpg" href="webroot/favicon/favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <div>
                <img scr="webroot/images/images.png" alt="Logo"/>
                <h1>Tema 5 Aplicacion Log In Log Off</h1>
            </div>
        </header>
        <main>
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            require_once '../config/ConexionDB_Users.php'; //archivo para conexion a la base de datos
            require_once'../core/231018libreriaValidacion.php'; //archivo para validaciones
            $miDB = new PDO($host,$USER,$PASSWORD); //conexion a la base de datos
            session_start();
        ?>
        <?php
            // Inicialización de variables
            $entradaOk = true; // Variable que nos indica que todo va bien
            $aErrores = [
                'Usuario' => '',
                'Password' => ''
            ]; // Array donde recogemos los mensajes de error
            $aRespuestas = [
                'Usuario' => '',
                'Password' => '',
                'DescUsuario' => '',
                'FechaHoraUltimaConexion' => '',
                'NumConexiones' => '',
                'Perfil' => '',
                'ImagenUsuario' => ''
            ]; // Array donde recogeremos las respuestas correctas (si $entradaOK)
            $resultadoConsulta = $miDB->prepare("select * from T01_Usuario where BINARY T01_CodUsuario = :usuario and BINARY T01_Password = SHA2(:password, 256)");//consulta
            $resultadoConsulta->execute([
                    ':usuario' =>$_SESSION['usuarioDAW2SGVAppLoginLogoff']['Usuario']
            ]);
            
                ?>
                <!-- Mostrar formulario -->
                <div>
                    <form name="input" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <!-- Mostrar los datos tecleados correctamente en intentos anteriores (en los value) -->
                        Usuario: <input type="text" name="TUsuario" value="<?php echo htmlspecialchars($aRespuestas['Usuario']); ?>"/><br>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Usuario'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Usuario']}</span>";}
                        ?>
                        Contraseña: <input type="password" name="TPassword" value="<?php echo htmlspecialchars($aRespuestas['Password']); ?>"/>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Password'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Password']}</span>";}
                        ?>
                        <div class="botones"><input type="submit" name="submit" value="Entrar"/><input type="submit" name="Cancelar" value="Cancelar"/></div>
                    </form>
                </div>
        </main>
        <footer>
            <div>
            <p><time datetime="2026-10-22">2026-2027</time> IES LOS SAUCES. ©Todos los derechos reservados</p>
            <p>Santiago González Vicente. 14/09/2026</p> 
            <a href="https://github.com/CuentaSantiago/SGVTema5ProyectoLogInLogOff"><i class="fa fa-github" style="font-size:40px; margin-right: 15px;"></i></a>
            <a href="../../indexProyectoDWES.php"><i class="fa fa-home" style="font-size:40px; margin-right: 15px;"></i></a>
            </div>
        </footer>
    </body>
</html>