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
    <title>Acta</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/acta.css">
</head>
<body>
    <header>
        <?php
            require("header.php");
        ?>
    </header>
    <article class="acta">
        <div class="acta_form">
            <h1>ACTA</h1>
            <form action="" method="post">
                <label for="">ID</label>
                <input type="number" name="id_form" id="id_form">
                <table>
                    <tr>
                        <td><label for="">Orden de inspección</label></td>
                        <td><select name="orden_form" id="orden_form">
                        <?php
                                $consulta = "SELECT * FROM [oper].[OrdenInspeccion] o 
                                inner join cmcl.EmpresaProveedora e ON o.idEmpresaProveedora = e.idEmpresaProveedora";
                                $rpta = sqlsrv_query($con, $consulta);
                                while($fila = sqlsrv_fetch_array($rpta)){
                                    $fecha = $fila['fechaEmision']->format("Y/m/d");
                                    echo "<option value='".$fila['idOrden']."'>".$fila['nombreEmpresaProveedora']." (".$fecha.")"."</option>";
                                }
                            ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label for="">Tipo de Análisis</label></td>
                        <td><select name="analisis_form" id="analisis_form">
                        <?php
                                $consulta = "SELECT * FROM [lab].[TipoAnalisis]";
                                $rpta = sqlsrv_query($con, $consulta);
                                while($fila = sqlsrv_fetch_array($rpta)){
                                    echo "<option value='".$fila['idTipoAnalisis']."'>".$fila['nombreAnalisis']."</option>";
                                }
                            ?>
                        </select></td>
                    </tr>
                </table>
                <input type="submit" value="Enviar" name="btn_mod" id="btn_enviar">
            </form>
            <?php
            if(isset($_POST['btn_mod'])){
                //Tomamos todos los datos que hay
                $id = $_POST['id_form'];
                $orden = $_POST['orden_form'];
                $tipo = $_POST['analisis_form'];

                //1 opc. El id está vacío: Se crea nuevo
                if($id==null){
                    /*$sql = "INSERT INTO oper.OrdenInspeccion VALUES (now(), '$f_insp',$desc, '$empleado','$empresa', '$tipo')";*/
                    $sql ="EXEC usp_llenar_acta $orden,$tipo";
                }
                //2 opc. El id está lleno: Se actualiza
                else{
                    /*
                    $sql = "UPDATE oper.OrdenInspeccion SET fechaDeInspección='$f_insp', descripcion='$desc', idEmpleado='$empleado'
                    , idEmpresaProveedora='$empresa', idTipoInspeccion WHERE idOrden = $id";
                    */
                    $sql = "EXEC usp_actualizar_acta $id, $orden, $tipo";
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
        <div class="acta_table">
            <h3>MIS ACTAS</h3>
            <p>EN este apartado se observan las actas en las que fuiste asignado, para llenar la descripción haz clic en el botón modificar.</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Fecha Emisión</th>
                    <th>Empresa</th>
                    <th>Empleado</th>
                    <th>Orden Inspección</th>
                    <th>Análisis</th>
                    <th>Modificar || Eliminar</th>
                </tr>
                <?php
                /*"SELECT * FROM oper.OrdenInspeccion o inner join [cmcl].[EmpresaProveedora] e ON o.idEmpresaProveedora = e.idEmpresaProveedora WHERE idEmpleado = ".$_SESSION['id']*/
                    $sql = "SELECT * FROM oper.acta o inner join [cmcl].[EmpresaProveedora] e ON o.idEmpresaProveedora = e.idEmpresaProveedora ORDER BY idActa DESC";/* WHERE idEmpleado = ".$_SESSION['id']*/
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila = sqlsrv_fetch_array($rpta)){
                        $f_em = $fila['fechaEmision']->format("Y/m/d");
                ?>
                <tr>
                    <td><?php echo $fila['idActa'] ?></td>
                    <td><?php echo $f_em ?></td>
                    <td><?php echo $fila['nombreEmpresaProveedora'] ?></td>
                    <td><?php echo $fila['idEmpleado'] ?></td>
                    <td><?php echo $fila['idOrdenInspeccion'] ?></td>
                    <td><?php echo $fila['idTipoAnalisis'] ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $fila['idActa'] ?>" name="id_modificar"  hidden>
                            <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
                            <input type="submit" name="btn_eliminar" class="btn_mod btn_eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php
            }
            if(isset($_POST['btn_editar'])){
                $idMod = $_POST['id_modificar'];
                $sql = "SELECT * FROM oper.Acta WHERE idActa = ".$idMod;
                $rpta = sqlsrv_query($con,$sql);
                $col = sqlsrv_fetch_array($rpta);
        ?>
            <script>
                inp = document.getElementById('id_form');
                inp.value = "<?php echo $col['idActa'] ?>";

                inp4 = document.getElementById('orden_form');
                inp4.value = "<?php echo $col['idOrdenInspeccion'] ?>";

                inp5 = document.getElementById('analisis_form');
                inp5.value = "<?php echo $col['idTipoAnalisis'] ?>";
            </script>
        <?php
            }
            if (isset($_POST['btn_eliminar'])){
                $id = $_POST['id_modificar'];
                $sql = "DELETE FROM oper.Acta WHERE idActa = ".$id;
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