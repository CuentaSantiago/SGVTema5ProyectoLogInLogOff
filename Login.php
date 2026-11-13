<?php
$exito=false;
if(!$exito){
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">
        <link rel="shortcut icon" type="image/jpg" href="webroot/favicon/favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <div>
                <h1>Tema 5 Aplicacion Log In Log Off</h1>
            </div>
        </header>
        <main>
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            require_once 'config/ConexionDB_Users.php'; //archivo para conexion a la base de datos
            require_once'core/231018libreriaValidacion.php'; //archivo para validaciones
            $miDB = new PDO($host,$USER,$PASSWORD); //conexion a la base de datos
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
                'Password' => ''
            ]; // Array donde recogeremos las respuestas correctas (si $entradaOK)
                    if(isset($_POST["submit"])){
                        // Validamos los datos para cada campo del formulario.
                        $aRespuestas['Usuario'] = $_POST['TUsuario'] ?? '';
                        $aRespuestas['Password'] = $_POST['TPassword'] ?? '';
                        $aErrores['Usuario'] = validacionFormularios::comprobarAlfabetico($aRespuestas['Usuario'],100,0,1);// comprobamos si hay algun error.
                        $aErrores['Password'] = validacionFormularios::comprobarAlfabetico($aRespuestas['Password'],100,0,1);// comprobamos si hay algun error.
                        foreach ($aErrores as $campo => $valor) {
                            if($valor !== null){
                                $entradaOk = false;
                            }
                        }
                    } else{
                        $entradaOk = false;        // Si el formulario no se ha rellenado nunca.
                    }
                ?>
                <!-- Mostrar formulario -->
                <div>
                    <form name="input" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <!-- Mostrar los datos tecleados correctamente en intentos anteriores (en los value) -->
                        Usuario: <input type="text" name="TUsuario" value="<?php htmlspecialchars($aRespuestas['Usuario']); ?>"/><br>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Usuario'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Usuario']}</span>";}
                        ?>
                        Contraseña: <input type="password" name="TPassword" value="<?php htmlspecialchars($aRespuestas['Password']); ?>"/>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Password'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Password']}</span>";}
                        ?>
                        <div class="botones"><input type="submit" name="submit" value="Entrar"/><input type="submit" name="Cancelar" value="Cancelar"/></div>
                    </form>
                </div>
                <div>
                <?php
                    // Tratamiento del formulario
                    try{
                        if($entradaOk){
                            $resultadoConsulta = $miDB->prepare("select * from T01_Usuario where BINARY T01_CodUsuario = :usuario and BINARY T01_Password like SHA2(:password, 256)");//consulta
                            if($resultadoConsulta->execute([
                                    ':usuario' =>$aRespuestas['Usuario'],
                                    ':password' =>$aRespuestas['Password']
                            ])){
                                echo "<h1>Entrada Exitosa</h1>";
                                $exito=true;
                            }
                        }
                    }catch(PDOException $e){//para atrapar excepciones
                        echo $e->getMessage()."<br>";
                    }
                    finally {
                    // Cierra la conexion con la base de datos
                        unset($Transaccion);
                    }
                ?>
            </div><!-- Espacio del form -->
        </main>
        <footer>
            <div>
            <p><time datetime="2026-10-22">2026-2027</time> IES LOS SAUCES. ©Todos los derechos reservados</p>
            <p>Santiago González Vicente. 14/09/2026</p>
            <a href="../indexProyectoDWES.php"><i class="fa fa-home" style="font-size:40px; margin-right: 15px;"></i></a>
            </div>
        </footer>
    </body>
</html>
<?php
}
if($exito){
    $aRespuestas['Password']="";
    $aRespuestas['Usuario']="";
    session_start();
    $_SERSION['usuarioDAW2SGVAppLoginLogoff']=$aRespuestas['Usuario'];
    $_SERSION['passwordDAW2SGVAppLoginLogoff']=$aRespuestas['Password'];
    $_COOKIE['sessionID']=$_SESSION['SSL_SESSION_ID'];
    header("Location: http://10.199.9.174/SGVDWESProyectoDWES/SGVDWESProyectoLogInLoOffgTema5/Programa.php");
    exit();
}