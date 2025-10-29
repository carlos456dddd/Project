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
                <label for="">Descripción</label>
                <textarea name="descripcion_form" id="descripcion_form" cols="30" rows="10"></textarea>
                <input type="submit" value="Modificar" name="btn_mod" id="btn_enviar">
            </form>
            <?php
                if(isset($_POST['btn_mod'])){
                    $id=$_POST['id_form'];
                    $desc =$_POST['descripcion_form'];
                    if($id != null){
                        $sql = "UPDATE oper.Acta SET descripcion='$desc' WHERE idActa = $id";
                        $rpta = sqlsrv_query($con,$sql);
                        if($rpta){
                            echo "Datos modificados correctamente.";
                        }
                        else{
                            echo "Al parecer hubo un error.";
                        }
                    }

                }
            ?>
        </div>
        <div class="acta_table">
            <h3>MIS ACTAS</h3>
            <p>En este apartado se observan las actas en las que fuiste asignado, para llenar la descripción haz clic en el botón modificar.</p>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Fecha Emisión</th>
                    <th>Empresa</th>
                    <th>Inspección</th>
                    <th>Análisis</th>
                    <th class="desc">Descripción</th>
                    <th>Modificar</th>
                </tr>
                <?php
                /*"SELECT * FROM oper.OrdenInspeccion o inner join [cmcl].[EmpresaProveedora] e ON o.idEmpresaProveedora = e.idEmpresaProveedora WHERE idEmpleado = ".$_SESSION['id']*/
                    $sql = "SELECT * FROM oper.acta o inner join [cmcl].[EmpresaProveedora] e ON o.idEmpresaProveedora = e.idEmpresaProveedora 
                    WHERE idEmpleado = ".$_SESSION['id']." order by idActa desc";/* WHERE idEmpleado = ".$_SESSION['id']*/
                    $rpta = sqlsrv_query($con, $sql);
                    while($fila = sqlsrv_fetch_array($rpta)){
                        $f_em = $fila['fechaEmision']->format("Y/m/d");
                ?>
                <tr>
                <td><?php echo $fila['idActa'] ?></td>
                    <td><?php echo $f_em ?></td>
                    <td><?php echo $fila['nombreEmpresaProveedora'] ?></td>
                    <td><?php echo $fila['idOrdenInspeccion'] ?></td>
                    <td><?php echo $fila['idTipoAnalisis'] ?></td>
                    <td class="desc"><?php echo $fila['descripcion'] ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="text" value="<?php echo $fila['idActa'] ?>" name="id_modificar"  hidden>
                            <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
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

                inp2 = document.getElementById('descripcion_form');
                inp2.value = "<?php echo $col['descripcion'] ?>";
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