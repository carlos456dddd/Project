<!DOCTYPE html>
<?php
    include("config/conexion.php");
    session_start();
    if(isset($_SESSION['usuario'])){
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Descanso Médico</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/descanso.css">
</head>
<body>
    <header>
    <?php
        require("header.php");
    ?>
    </header>
    <article>
        <div class="descanso">
        <div class="descanso_form">
            <h1>Descanso Médico</h1>
            <form action="" method="post">
                <label for="">ID Petición</label>
                <input type="number" name="id_form" id="id_form">
                <label for="">Descripción</label>
                <textarea type="text" name="descripcion_form" id="descripcion_form"></textarea>
                <label for="">Fecha Salida:</label>
                <input type="date" name="salida_form" id="salida_form">
                <label for="">Fecha Retorno:</label>
                <input type="date" name="retorno_form" id="retorno_form">
                <input type="submit" value="Enviar" name="enviar_form" class="enviar_form">
            </form>

            <?php
            if(isset($_POST['enviar_form'])){
                $id = $_POST['id_form'];
                $descripcion = $_POST['descripcion_form'];
                $salida = $_POST['salida_form'];
                $retorno = $_POST['retorno_form'];
                
                if($id == null){
                    $sql = "INSERT INTO rrhh.DescansoMedico VALUES ('$descripcion',GETDATE(),'$salida','$retorno','".$_SESSION['id']."')";
                } else{
                    $sql = "UPDATE rrhh.DescansoMedico SET descripcion='$descripcion', fechaSalida = '$salida', 
                    fechaRetorno = '$retorno' WHERE idPeticion = $id";
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
        <div class="tabla">
            <h3>MIS DESCANSOS MÉDICOS</h3>
            <p>En este apartado se observan los descansos médicos solicitados.</p>
            <table>
                <tr>
                    <th class="table_id">ID</th>
                    <th>Descripción</th>
                    <th>Fecha Solicitud</th>
                    <th>Fecha Salida</th>
                    <th>Fecha Retorno</th>
                    <th class="edit">EDITAR || ELIMINAR</th>
                </tr>
                    <?php
                        $sql = "SELECT * FROM rrhh.DescansoMedico WHERE idEmpleado = ".$_SESSION['id'];
                        $rpta = sqlsrv_query($con, $sql);
                        while($fila_descanso = sqlsrv_fetch_array($rpta)){
                            $f_sol = $fila_descanso['fechaSolicitud']->format("Y/m/d");
                            $f_sal = $fila_descanso['fechaSalida']->format("Y/m/d");
                            $f_ret = $fila_descanso['fechaRetorno']->format("Y/m/d");
                        ?>
                        <tr>
                            <td><?php echo $fila_descanso['idPeticion'] ?></td>
                            <td><?php echo $fila_descanso['descripcion'] ?></td>
                            <td><?php echo $f_sol ?></td>
                            <td><?php echo $f_sal ?></td>
                            <td><?php echo $f_ret ?></td>

                            <td><form action="" method="POST">
                                <input type="text" value="<?php echo $fila_descanso['idPeticion'] ?>" name="id_modificar"  hidden>
                                <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
                                <input type="submit" name="btn_eliminar" class="btn_mod btn_eliminar" value="Eliminar">
                            </form></td>

                        </tr>
                        <?php

                        }
                        if(isset($_POST['btn_editar'])){
                            $idMod = $_POST['id_modificar'];
                            $sql = "SELECT * FROM rrhh.DescansoMedico WHERE idPeticion = ".$idMod;
                            $rpta = sqlsrv_query($con,$sql);
                            $col = sqlsrv_fetch_array($rpta);
                    ?>
                        <script>
                            inp = document.getElementById('id_form');
                            inp.value = "<?php echo $col['idPeticion'] ?>";

                            inp = document.getElementById('descripcion_form');
                            inp.value = "<?php echo $col['descripcion'] ?>";

                            inp = document.getElementById('empleado_form');
                            inp.value = "<?php echo $col['idEmpleado'] ?>";

                            
                        </script>
                    <?php
                        }
                        if (isset($_POST['btn_eliminar'])){
                            $id = $_POST['id_modificar'];
                            $sql = "DELETE FROM rrhh.DescansoMedico WHERE idPeticion = ".$id;
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