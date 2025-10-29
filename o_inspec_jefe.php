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
    <title>Orden de Inspección</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/o_inspect_empl.css">
</head>
<body>
    <header>
        <?php
            require("header.php");
        ?>
    </header>
    <article class="orden_inspeccion">
        <div class="orden_form">
            <h1>ORDEN DE INSPECCIÓN</h1>
            <form action="" method="post">
                <label for="">ID</label>
                <input type="number" name="id_form" id="id_form">
                <label for="">Fecha de Inspección</label>
                <input type="date" name="f_insp_form" id="f_insp_form">
                <label for="">Descripción</label>
                <textarea name="descripcion_form" id="descripcion_form" cols="30" rows="10"></textarea>
                <table>
                    <tr>
                        <td><label for="">Empleado</label></td>
                        <td>
                            <select name="empleado_form" id="empleado_form">
                            <?php
                                $consulta = "SELECT idEmpleado, CONCAT(nombresEmpleado, ' ', apellidosEmpleado) nombre FROM rrhh.Empleado";
                                $rpta = sqlsrv_query($con, $consulta);
                                while($fila = sqlsrv_fetch_array($rpta)){
                                    echo "<option value='".$fila['idEmpleado']."'>".$fila['nombre']."</option>";
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Empresa</label></td>
                        <td>
                            <select name="empresa_form" id="empresa_form">
                            <?php
                                $consulta = "SELECT * FROM [cmcl].[EmpresaProveedora]";
                                $rpta = sqlsrv_query($con, $consulta);
                                while($fila = sqlsrv_fetch_array($rpta)){
                                    echo "<option value='".$fila['idEmpresaProveedora']."'>".$fila['nombreEmpresaProveedora']."</option>";
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Tipo de Inspección</label></td>
                        <td>
                            <select name="tipo_form" id="tipo_form">
                            <?php
                                $consulta = "SELECT * FROM [oper].[TipoInspeccion]";
                                $rpta = sqlsrv_query($con, $consulta);
                                while($fila = sqlsrv_fetch_array($rpta)){
                                    echo "<option value='".$fila['idTipoInspeccion']."'>".$fila['nombreInspección']."</option>";
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Modificar" name="mod_form" class="mod_form" id="btn_enviar">

            </form>
            <?php
            if(isset($_POST['mod_form'])){
                //Tomamos todos los datos que hay
                $id = $_POST['id_form'];
                $f_insp = $_POST['f_insp_form'];
                $desc = $_POST['descripcion_form'];
                $empleado = $_POST['empleado_form'];
                $empresa = $_POST['empresa_form'];
                $tipo = $_POST['tipo_form'];

                //1 opc. El id está vacío: Se crea nuevo
                if($id==null){
                    $sql = "INSERT INTO oper.OrdenInspeccion VALUES (getdate(), '$f_insp','$desc', '$empleado','$empresa', '$tipo')";
                }
                //2 opc. El id está lleno: Se actualiza
                else{
                    
                    $sql = "UPDATE oper.OrdenInspeccion SET fechaDeInspección='$f_insp', descripcion='$desc', idEmpleado='$empleado'
                    , idEmpresaProveedora='$empresa', idTipoInspeccion=$tipo WHERE idOrden = $id";
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
        <div class="orden_table">
            <h3>ORDENES DE INSPECCIÓN</h3>
            <p>En este apartado se visualizan las ordenes de inspección a las que fuiste asignado para que las tengas en cuenta. 
            Aquí también deben ingresarse los reportes de la orden de inspección.</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Fecha Generación</th>
                    <th>Fecha de Inspección</th>
                    <th class="desc">Descripción</th>
                    <th>Empleado</th>
                    <th>Empresa</th>
                    <th>Inspección</th>
                    <th class="mod">Modificar || Eliminar</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM oper.OrdenInspeccion order by idOrden desc";
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila = sqlsrv_fetch_array($rpta)){
                        $f_em = $fila['fechaEmision']->format("Y/m/d");
                        $f_in = $fila['fechaDeInspección']->format("Y/m/d");
                ?>
                <tr>
                    <td><?php echo $fila['idOrden']; ?></td>
                    <td><?php echo $f_em; ?></td>
                    <td><?php echo $f_in; ?></td>
                    <td class="desc"><?php echo $fila['descripcion']; ?></td>
                    <td><?php echo $fila['idEmpleado']; ?></td>
                    <td><?php echo $fila['idEmpresaProveedora']; ?></td>
                    <td><?php echo $fila['idTipoInspeccion']; ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $fila['idOrden']; ?>" name="id_modificar"  hidden>
                            <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
                            <input type="submit" name="btn_eliminar" class="btn_mod btn_eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php
                }
                if(isset($_POST['btn_editar'])){
                    $idMod = $_POST['id_modificar'];
                    $sql = "SELECT * FROM [oper].[OrdenInspeccion] WHERE idOrden = ".$idMod;
                    $rpta = sqlsrv_query($con, $sql);
                    $col = sqlsrv_fetch_array($rpta);
                ?>
                <script>
                    inp = document.getElementById("id_form");
                    inp.value = "<?php echo $col['idOrden'] ?>";
                    inp2 = document.getElementById("descripcion_form");
                    inp2.value = "<?php echo $col['descripcion'] ?>";
                    inp3 = document.getElementById("empleado_form");
                    inp3.value = "<?php echo $col['idEmpleado'] ?>";
                    inp4 = document.getElementById("empresa_form");
                    inp4.value = "<?php echo $col['idEmpresaProveedora'] ?>";
                    inp5 = document.getElementById("tipo_form");
                    inp5.value = "<?php echo $col['idTipoInspeccion'] ?>";
                </script>

                <?php
                }
            if (isset($_POST['btn_eliminar'])){
                $id = $_POST['id_modificar'];
                $sql = "DELETE FROM oper.OrdenInspeccion WHERE idOrden = ".$id;
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