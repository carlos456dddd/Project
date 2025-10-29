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
    <title>Certificación</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/certificado.css">
</head>
<body>
    <header>
        <?php
            require("header.php");
        ?>
    </header>
    <article class="certificado">
        <div class="certificado_form">
            <h1>CERTIFICADOS</h1>
            <form action="" method="post">
                <label for="">ID</<label>
                <input type="number" name="id_form" id="id_form">
                <label for="">Tipo certificado</label>
                <select name="tipo_cert_form" id="tipo_cert_form">
                <?php
                    $consulta = "SELECT * FROM [cmcl].[TipoCertificado]";
                    $rpta = sqlsrv_query($con, $consulta);
                    while($fila = sqlsrv_fetch_array($rpta)){
                    echo "<option value='".$fila['idTipoCertificado']."'>".$fila['nombreCertificado']."</option>";
                    }
                    ?>
                </select>
                <label for="">Empresa Cliente</label>
                <select name="cliente_form" id="cliente_form">
                <?php
                    $consulta = "SELECT * FROM [cmcl].[EmpresaCliente]";
                    $rpta = sqlsrv_query($con, $consulta);
                    while($fila = sqlsrv_fetch_array($rpta)){
                    echo "<option value='".$fila['idEmpresaCliente']."'>".$fila['nombreEmpresaCliente']."</option>";
                    }
                    ?>
                </select>
            
                <label for="">Acta</label>
                <select name="acta_form" id="acta_form">
                <?php
                    $consulta = "SELECT * FROM [oper].[Acta] a
                    inner join cmcl.EmpresaProveedora e ON a.idEmpresaProveedora = e.idEmpresaProveedora";
                    $rpta = sqlsrv_query($con, $consulta);
                    while($fila = sqlsrv_fetch_array($rpta)){
                        $f = $fila['fechaEmision']->format("Y/m/d");
                        echo "<option value='".$fila['idActa']."'>".$fila['nombreEmpresaProveedora']."(".$f.")</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="enviar_form" id="btn_enviar">
            </form>
            <?php
                if(isset($_POST['enviar_form'])){
                    $id = $_POST['id_form'];
                    $certificado = $_POST['tipo_cert_form'];
                    $cliente = $_POST['cliente_form'];
                    $acta = $_POST['acta_form'];
                    if($id==null){
                        $sql = "EXEC usp_llenar_certificado $certificado,$cliente, $acta";
                    }
                    else{
                        $sql = "EXEC usp_actualizar_certificado $id,$certificado,$cliente,$acta";
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
        <div class="certificado_table">
            <h3>CERTIFICADO</h3>
            <p>En este apartado se encuentran todos los certificados expedidos por la empresa SGS.</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Fecha Emisión</th>
                    <th>Tipo Certificado</th>
                    <th class="emp">Empresa Cliente</th>
                    <th class="emp">Empresa Proveedora</th>
                    <th>Acta</th>
                    <th class="mod">Modificar || Eliminar</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM cmcl.Certificacion c
                    inner join cmcl.TipoCertificado t ON c.idTipoCertificado = t.idTipoCertificado
                    inner join cmcl.EmpresaCliente ec ON ec.idEmpresaCliente = c.idEmpresaCliente
                    inner join cmcl.EmpresaProveedora ep ON c.idEmpresaProveedora = ep.idEmpresaProveedora 
                    order by idCertificacion desc";
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila = sqlsrv_fetch_array($rpta)){
                        $f_cer = $fila['fechaCertificacion']->format("Y/m/d");
                ?>
                <tr>
                    <td><?php echo $fila['idCertificacion'] ?></td>
                    <td><?php echo $f_cer ?></td>
                    <td><?php echo $fila['nombreCertificado'] ?></td>
                    <td><?php echo $fila['nombreEmpresaCliente'] ?></td>
                    <td><?php echo $fila['nombreEmpresaProveedora'] ?></td>
                    <td><?php echo $fila['idActa'] ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $fila['idCertificacion'] ?>" name="id_modificar"  hidden>
                            <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
                            <input type="submit" name="btn_eliminar" class="btn_mod btn_eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php
            }
            if(isset($_POST['btn_editar'])){
                $idMod = $_POST['id_modificar'];
                $sql = "SELECT * FROM cmcl.Certificacion WHERE idCertificacion = ".$idMod;
                $rpta = sqlsrv_query($con,$sql);
                $col = sqlsrv_fetch_array($rpta);
        ?>
            <script>
                inp = document.getElementById('id_form');
                inp.value = "<?php echo $col['idCertificacion'] ?>";

                inp2 = document.getElementById('tipo_cert_form');
                inp2.value = "<?php echo $col['idTipoCertificado'] ?>";

                inp3 = document.getElementById('cliente_form');
                inp3.value = "<?php echo $col['idEmpresaCliente'] ?>";

                inp5 = document.getElementById('acta_form');
                inp5.value = "<?php echo $col['idActa'] ?>";                
            </script>
        <?php
            }
            if (isset($_POST['btn_eliminar'])){
                $id = $_POST['id_modificar'];
                $sql = "DELETE FROM cmcl.Certificacion WHERE idCertificacion = ".$id;
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