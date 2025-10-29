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
                <label for="">Descripción</label>
                <textarea name="descripcion_form" id="descripcion_form" cols="30" rows="10"></textarea>
                <input type="submit" value="Modificar" name="mod_form" class="mod_form" id="btn_enviar">
            </form>
            <?php
            if (isset($_POST['mod_form'])){
                $id = $_POST['id_form'];
                $desc = $_POST['descripcion_form'];
                $sql = "UPDATE oper.OrdenInspeccion SET descripcion = '$desc' WHERE idOrden = $id";
                if($id!=null){
                    $rpta = sqlsrv_query($con,$sql);
                }
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
                    <th>Descripción</th>
                    <th>Empresa</th>
                    <th>Tipo Inspección</th>
                    <th>Modificar</th>
                </tr>
                <?php
                /*"SELECT * FROM oper.OrdenInspeccion o inner join [cmcl].[EmpresaProveedora] e ON o.idEmpresaProveedora = e.idEmpresaProveedora WHERE idEmpleado = ".$_SESSION['id']*/
                    $sql = "SELECT * FROM oper.OrdenInspeccion o inner join [cmcl].[EmpresaProveedora] e ON o.idEmpresaProveedora = e.idEmpresaProveedora WHERE idEmpleado = ".$_SESSION['id'];
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila = sqlsrv_fetch_array($rpta)){
                        $f_em = $fila['fechaEmision']->format("Y/m/d");
                        $f_in = $fila['fechaDeInspección']->format("Y/m/d");
                ?>
                <tr>
                    <td><?php echo $fila['idOrden'] ?></td>
                    <td><?php echo $f_em ?></td>
                    <td><?php echo $f_in ?></td>
                    <td><?php echo $fila['descripcion'] ?></td>
                    <td><?php echo $fila['nombreEmpresaProveedora'] ?></td>
                    <td><?php echo $fila['idTipoInspeccion'] ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $fila['idOrden'] ?>" name="id_modificar"  hidden>
                            <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
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
                </script>
                <?php
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