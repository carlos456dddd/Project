<?php
include("config/conexion.php");

$sql = "SELECT * FROM rrhh.Empleado WHERE idEmpleado = ".$_SESSION['id'];
$rpta = sqlsrv_query($con,$sql,array(), array( "Scrollable" => 'static' ));

$persona = sqlsrv_fetch_array($rpta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/normalize.css">
</head>
<body>
<nav>
    <ul class="navigator">
        <img src="image/sgs.png" alt="" class="titulo">>
        <!--Si es empleado-->
        <?php
            if(($persona['idPuesto']==1) || ($persona['idPuesto']==2) || ($persona['idPuesto']==3) || ($persona['idPuesto']==5) || ($persona['idPuesto']==9) || ($persona['idPuesto']==10)){
        ?>
            <li><a href="descanso_empl.php">Descanso Médico</a></li>
            <li><a href="vacaciones_empl.php">Vacaciones</a></li>
            <li><a href="o_inspec_empl.php">Orden de inspección</a></li>
            <li><a href="acta_emp.php">Actas</a></li>
        <?php
            }
        ?>
        
        <!--Si es de secretaría-->
        <?php
            if(($persona['idPuesto']==4)){
        ?>
            <li><a href="empleado_sec.php">Empleados</a></li>
            <li><a href="#">Descansos</a></li>
            <li><a href="#">Vacaciones</a></li>
            <li><a href="#">Orden Inspección</a></li>
            <li><a href="#">Actas</a></li>
            <li><a href="#">Certificación</a></li>
        <?php
            }
        ?>

        <!--Si es jefe-->
        <?php
            if(($persona['idPuesto']==6) || ($persona['idPuesto']==7) || ($persona['idPuesto']==8) || ($persona['idPuesto']==11) || 
            ($persona['idPuesto']==12) || ($persona['idPuesto']==13)|| ($persona['idPuesto']==15)|| ($persona['idPuesto']==16)
            || ($persona['idPuesto']==17)|| ($persona['idPuesto']==18)|| ($persona['idPuesto']==19)|| ($persona['idPuesto']==20)|| 
            ($persona['idPuesto']==22)){
        ?>
            <li><a href="empleado_jefe.php">Empleado</a></li>
            <li><a href="o_inspec_jefe.php">Orden Inspección</a></li>
            <li><a href="acta_ger.php">Actas</a></li>
            <li><a href="certificado.php">Certificaciones</a></li>
            <li><a href="vacaciones_jefe.php">Vacaciones</a></li>
        <?php
            }
        ?>
        <li><a href="logout.php">Salir</a></li>
    </ul>
</nav>
</body>
</html>
