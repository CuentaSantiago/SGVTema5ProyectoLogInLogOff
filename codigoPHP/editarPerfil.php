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
                        <!-- Mostrar los datos tecleados correctamente en intentos anteriores (en los value) -->
                        Descripcion Usuario: <input type="text" name="TDescUsuario" value="<?php echo htmlspecialchars($aRespuestas['DescUsuario']); ?>"/><br>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Usuario'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Usuario']}</span>";}
                        ?>
                        Fecha y Hora de la Ultima Conexion: <input type="password" name="TPassword" value="<?php echo htmlspecialchars($aRespuestas['Password']); ?>"/>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Password'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Password']}</span>";}
                        ?>
                        <!-- Mostrar los datos tecleados correctamente en intentos anteriores (en los value) -->
                        Numero conexiones: <input type="text" name="TUsuario" value="<?php echo htmlspecialchars($aRespuestas['Usuario']); ?>"/><br>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Usuario'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Usuario']}</span>";}
                        ?>
                        Perfil: <input type="password" name="TPassword" value="<?php echo htmlspecialchars($aRespuestas['Password']); ?>"/>
                        <?php
                        // Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                        if(!empty($aErrores['Password'])) {echo "<span style='color:red; display:block; font-size:13px;'>{$aErrores['Password']}</span>";}
                        ?>
                        Imagebn Usuario: <input type="password" name="TPassword" value="<?php echo htmlspecialchars($aRespuestas['Password']); ?>"/>
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