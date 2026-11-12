<html>
    <head>
        <title>Ejercicio 2</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            table, td, tr, th{
                border: 3px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h1><a href='../indexProyectoTema4.php'>volver</a></h1>
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL); //para ver errores
        ?>
        <?php
        require_once '../core/ConexionDB.php'; //archivo para conexion a la base de datos
            try{
                $miDB = new PDO($host,$USER,$PASSWORD); //conexion a la base de datos
                $resultadoConsulta = $miDB->query('select * from T02_DEPARTAMENTO');//consulta
                echo "<h2>Querry</h2>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Codigo</th>";
                echo "<th>Nombre</th>";
                echo "<th>Fecha Creacion</th>";
                echo "<th>Valor de Departmento</th>";
                echo "<th>FechaBaja</th>";
                echo "</tr>";
                while ($registro = $resultadoConsulta ->fetchObject()){//mostrar resultados
                    echo "<tr>";
                    echo '<td>'.$registro->T02_CodDepartamento.'</td>';
                    echo '<td>'.$registro->T02_DescDepartamento.'</td>';
                    $FechaCreacion = new DateTime($registro->T02_FechaCreacionDepartamento);
                    echo '<td>'.$FechaCreacion->format('d/m/Y').'</td>';
                    echo '<td>'.number_format($registro->T02_VolumenDeNegocio,2,',','.').' €</td>';
                    if ($registro->T02_FechaBajaDepartamento!==null) {//comprobacion null
                        $FechaBaja = new DateTime($registro->T02_FechaBajaDepartamento);
                        echo '<td>'.$FechaBaja->format('d/m/Y').'</td>';
                    } else {
                        echo '<td></td>';
                    }
                    echo "<tr>";
                }
                echo "<table>";
                echo "<h2>Consulta preparada</h2>";
                $resultadoConsulta = $miDB->prepare('select * from T02_DEPARTAMENTO');//consulta preparada
                $resultadoConsulta->execute();//ejecutada
                echo "<table>";
                echo "<tr>";
                echo "<th>Codigo</th>";
                echo "<th>Nombre</th>";
                echo "<th>Fecha Creacion</th>";
                echo "<th>Valor de Departmento</th>";
                echo "<th>FechaBaja</th>";
                echo "</tr>";
                while ($registro = $resultadoConsulta ->fetchObject()){//mostrar resultados
                    echo "<tr>";
                    echo '<td>'.$registro->T02_CodDepartamento.'</td>';
                    echo '<td>'.$registro->T02_DescDepartamento.'</td>';
                    $FechaCreacion = new DateTime($registro->T02_FechaCreacionDepartamento);
                    echo '<td>'.$FechaCreacion->format('d/m/Y').'</td>';
                    echo '<td>'.number_format($registro->T02_VolumenDeNegocio,2,',','.').' €</td>';
                    if ($registro->T02_FechaBajaDepartamento!==null) {//comprobacion null
                        $FechaBaja = new DateTime($registro->T02_FechaBajaDepartamento);
                        echo '<td>'.$FechaBaja->format('d/m/Y').'</td>';
                    } else {
                        echo '<td></td>';
                    }
                    echo "<tr>";
                }
                echo "<table>";
            }catch(PDOException $e){//para atrapar excepciones
                echo $e->getMessage()."<br>";
            }
            finally {
            // Cierra la conexion con la base de datos
                unset($Transaccion);
            }
        ?>
    </body>
</html>