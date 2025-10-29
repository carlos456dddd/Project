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
    <link rel="stylesheet" href="styles/vacas_emp.css">
</head>
<body>
    <header>
        <?php
            require("header.php");
        ?>
    </header>
    <article class="vacaciones">
        <div class="form_vacaciones">
            <h1>Vacaciones</h1>
            <form action="" method="post">
                <label for="">ID</label>
                <input type="number" name="id_form" id="id_form">
                <label for="">Fecha Inicio</label>
                <input type="date" name="f_ini_form" id="f_ini_form">
                <label for="">Fecha Retorno</label>
                <input type="date" name="f_ret_form" id="f_ret_form">
                <input type="submit" name="btn_enviar" id="btn_enviar" value="Enviar">
            </form>
            <?php
            if(isset($_POST['btn_enviar'])){
                //Tomamos todos los datos que hay
                $id = $_POST['id_form'];
                $f_ini = $_POST['f_ini_form'];
                $f_ret = $_POST['f_ret_form'];
                
                //1 opc. El id está vacío: Se crea nuevo
                if($id==null){
                    $sql = "INSERT INTO rrhh.GestionVacaciones VALUES ('$f_ini', '$f_ret', ".$_SESSION['id'].", 'False')";
                }
                //2 opc. El id está lleno: Se actualiza
                else{
                    $sql = "UPDATE rrhh.GestionVacaciones SET fechaInicio='$f_ini', fechaRetorno='$f_ret' WHERE idEmpleado = $id";
                }
                $rpta = sqlsrv_query($con,$sql);
                if($rpta){
                    echo "Datos modificados correctamente.";
                }
                else{
                    echo "Al parecer hubo un error.";
                }
            }
            ?>
        </div>
        <div class="table_vacaciones">
        <div class="table_v_aceptadas">
            <h3>SOLICITUDES CONFIRMADAS</h3>
            <p>En este apartado se visualizan las solicitudes de vacaciones que 
                fueron aceptadas. Ya no es posible modificarlas ni eliminarlas.</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Retorno</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM rrhh.GestionVacaciones WHERE idEmpleado = ".$_SESSION['id']." AND confirmado = 'true'";
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila_vac = sqlsrv_fetch_array($rpta)){
                        $f_ini = $fila_vac['fechaInicio']->format("Y/m/d");
                        $f_ret = $fila_vac['fechaRetorno']->format("Y/m/d");
                ?>
                <tr>
                    <td><?php echo $fila_vac['idVacaciones'] ?></td>
                    <td><?php echo $f_ini ?></td>
                    <td><?php echo $f_ret ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
        <div class="table_v_sin_aceptar">
            <h3>SOLICITUDES POR CONFIRMAR</h3>
            <p>En este apartado se encuentran las solicitudes por confirmar. 
                Pueden ser alteradas o eliminadas hasta que sean aceptadas.</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Retorno</th>
                    <th class="editar">Editar || Eliminar</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM rrhh.GestionVacaciones WHERE idEmpleado = ".$_SESSION['id']." AND confirmado = 'false'";
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila_vac = sqlsrv_fetch_array($rpta)){
                        $f_ini = $fila_vac['fechaInicio']->format("Y/m/d");
                        $f_ret = $fila_vac['fechaRetorno']->format("Y/m/d");
                ?>
                <tr>
                    <td><?php echo $fila_vac['idVacaciones'] ?></td>
                    <td><?php echo $f_ini ?></td>
                    <td><?php echo $f_ret ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $fila_vac['idVacaciones']; ?>" name="id_modificar"  hidden>
                            <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
                            <input type="submit" name="btn_eliminar" class="btn_mod btn_eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php
                    }
                    if(isset($_POST['btn_editar'])){
                        $idMod = $_POST['id_modificar'];
                        $sql = "SELECT * FROM [rrhh].[GestionVacaciones] WHERE idVacaciones = ".$idMod;
                        $rpta = sqlsrv_query($con, $sql);
                        $col = sqlsrv_fetch_array($rpta);
                        ?>
                        <script>
                            inp = document.getElementById("id_form");
                            inp.value = "<?php echo $col['idVacaciones'] ?>";
                        </script>

                        <?php
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