<?php
    session_start();
    include("config/conexion.php");
    if(isset($_SESSION['usuario'])){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacaciones Empleado</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/vacas_jefe.css">
</head>
<body>
    <header>
        <?php
            require("header.php");
        ?>
    </header>
    <article class="vacaciones">
        <div class="table_vacaciones">
            <h1>VACACIONES</h1>
        <div class="table_v_sin_aceptar">
            <h3>SOLICITUDES POR CONFIRMAR</h3>
            <p>En este apartado se encuentran las solicitudes de vacaciones de empleados por confirmar. De ser rechazada, se eliminará.</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Retorno</th>
                    <th class="editar">Editar || Eliminar</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM rrhh.GestionVacaciones g
                    inner join rrhh.Empleado e ON g.idEmpleado = e.idEmpleado WHERE confirmado = 'false'";
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila_vac = sqlsrv_fetch_array($rpta)){
                        $f_ini = $fila_vac['fechaInicio']->format("Y/m/d");
                        $f_ret = $fila_vac['fechaRetorno']->format("Y/m/d");
                ?>
                <tr>
                    <td><?php echo $fila_vac['idVacaciones'] ?></td>
                    <td><?php echo $fila_vac['nombresEmpleado']." ".$fila_vac['apellidosEmpleado'] ?></td>
                    <td><?php echo $f_ini ?></td>
                    <td><?php echo $f_ret ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $fila_vac['idVacaciones'] ?>" name="id_modificar"  hidden>
                            <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Aceptar">
                            <input type="submit" name="btn_eliminar" class="btn_mod btn_eliminar" value="Rechazar">
                        </form>
                    </td>
                </tr>
                <?php
                    }
                    if(isset($_POST['btn_editar'])){
                        $idMod = $_POST['id_modificar'];
                        $sql = "UPDATE [rrhh].[GestionVacaciones] SET confirmado='True' WHERE idVacaciones = ".$idMod;
                        $rpta = sqlsrv_query($con, $sql);
                        echo "Solicitud Confirmada.";
                    }
                    if (isset($_POST['btn_eliminar'])){
                        $id = $_POST['id_modificar'];
                        $sql = "DELETE FROM rrhh.GestionVacaciones WHERE idVacaciones = ".$id;
                        $rpta = sqlsrv_query($con, $sql);
                        if(!$rpta){
                            echo "ERROR!.";
                        }
                    }
                ?>
            </table>
        </div>
    </article>
    <footer>
        <?php
            require("footer.php");
        ?>
    </footer>
</body>
</html>
<?php
}
?>