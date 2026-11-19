<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../config/ConexionDB_Users.php'; //archivo para conexion a la base de datos
require_once'../core/231018libreriaValidacion.php'; //archivo para validaciones
$miDB = new PDO($host,$USER,$PASSWORD); //conexion a la base de datos
session_start();
$update=false; // Variable que nos indica que todo va bien
$borrar=false; // Variable que nos indica que todo va bien
if (!isset($_SESSION['usuarioDAW2SGVAppLoginLogoff'])) {
    header("Location: Login.php");
    exit;
}
// Inicialización de variables
$aErrores = [
    'Password' => '',
    'DescUsuario' => '',
    'Perfil' => '',
    'ImagenUsuario' => ''
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
if(isset($_POST["update"])){
    // Validamos los datos para cada campo del formulario.
    $aRespuestas['Password'] = $_POST['TPassword'] ?? '';
    $aRespuestas['DescUsuario'] = $_POST['TDescUsuario'] ?? '';
    $aRespuestas['ImagenUsuario'] = $_POST['TImagenUsuario'] ?? '';
    $aErrores['Password'] = validacionFormularios::comprobarAlfabetico($aRespuestas['Password'],100,0,1);// comprobamos si hay algun error.
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfabetico($aRespuestas['DescUsuario'],100,0,1);// comprobamos si hay algun error.
    foreach ($aErrores as $campo => $valor) {
        if($valor !== null){
            $update = false;
        }
    }
} else{
    $update = false;        // Si el formulario no se ha rellenado nunca.
}
// Tratamiento del formulario
try{
    if($update){
        $ConsultaUpdate=$miDB->prepare("Update T01_Usuario set T01_Password=SHA2(:password,256), T01_DescUsuario=:DescUsuario, T01_ImagenUsuario=:ImagenUsuario");
        if($ConsultaUpdate->execute([
            ':password'=>$aRespuestas['Password'],
            ':DescUsuario'=>$aRespuestas['DescUsuario'],
            ':ImagenUsuario'=>$aRespuestas['ImagenUsuario'],
        ])){
            $ActualizacionConsulta->execute([
                ':usuario' =>$aRespuestas['Usuario']]);
        }
    }
}catch(PDOException $e){//para atrapar excepciones
    echo $e->getMessage()."<br>";
}
finally {
// Cierra la conexion con la base de datos
    unset($resultadoConsulta);
}
?>
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
            <div>
                <form name="input" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <!-- Mostrar los datos tecleados correctamente en intentos anteriores (en los value) -->
                    Usuario: <input type="text" name="TUsuario" value="<?php echo htmlspecialchars($aRespuestas['Usuario']); ?>" readonly/><br>
                    <?php
                    // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    if(!empty($aErrores['Usuario'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Usuario']}</span>";}
                    ?>
                    Contraseña: <input type="password" name="TPassword" value="<?php echo htmlspecialchars($aRespuestas['Password']); ?>"/>
                    <?php
                    // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    if(!empty($aErrores['Password'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Password']}</span>";}
                    ?>
                    <!-- Mostrar los datos tecleados correctamente en intentos anteriores (en los value) -->
                    Descripcion Usuario: <input type="text" name="TDescUsuario" value="<?php echo htmlspecialchars($aRespuestas['DescUsuario']); ?>"/><br>
                    <?php
                    // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    if(!empty($aErrores['DescUsuario'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['DescUsuario']}</span>";}
                    ?>
                    Fecha y Hora de la Ultima Conexion: <input type="date" name="TUltimaConexion" value="<?php echo htmlspecialchars($aRespuestas['UltimaConexion']); ?>" readonly />
                    <?php
                    // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    if(!empty($aErrores['UltimaConexion'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['UltimaConexion']}</span>";}
                    ?>
                    <!-- Mostrar los datos tecleados correctamente en intentos anteriores (en los value) -->
                    Numero conexiones: <input type="number" name="TNumConexiones" value="<?php echo htmlspecialchars($aRespuestas['NumConexiones']); ?>" readonly /><br>
                    <?php
                    // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    if(!empty($aErrores['NumConexiones'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['NumConexiones']}</span>";}
                    ?>
                    Perfil: <input type="text" name="TPerfil" value="<?php echo htmlspecialchars($aRespuestas['Perfil']); ?>" readonly />
                    <?php
                    // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    if(!empty($aErrores['Perfil'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Perfil']}</span>";}
                    ?>
                    Imagen Usuario: <input type="image" name="TImagenUsuario" value="<?php echo htmlspecialchars($aRespuestas['ImagenUsuario']); ?>"/>
                    <?php
                    // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    if(!empty($aErrores['ImagenUsuario'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['ImagenUsuario']}</span>";}
                    ?>
                    <div class="botones"><input type="submit" name="update" value="Actualizar"/><input type="submit" name="Delete" value="Borrar Cuenta"/><input type="submit" name="Cancelar" value="Cancelar"/></div>
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