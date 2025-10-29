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
    <title>Módulo Empleado</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/empleado_sec.css">
</head>
<body>
    <header>
        <?php
        require("header.php");
        ?>

    </header>
    <article>
        <div class="empleados">
        <div class="form_empleados">
            <h1>Empleado</h1>
            <p class="mensaje">Introduzca los datos del empleado a registrar. La casilla ID debe ser llenada solo para realizar la modificación de un registro. </p>
            <form action="" method="POST">
                <table class="table_form">
                    <tr>
                    <td class="id_form"><label for="id_form">ID:</label></td>
                    <td><input type="text" name="id_form" id="id_form"></td><td></td><td></td>
                    </tr>
                    <tr>
                    <td><label for="id_form">Nombres:</label></td>
                    <td><input type="text" name="nombre_form" id="nombre_form" required></td>
                    <td class="apellido_form"><label for="id_form">Apellidos:</label></td>
                    <td><input type="text" name="apellido_form" id="apellido_form" required></td>
                    </tr>
                    <tr>
                    <td><label for="id_form">Correo:</label></td>
                    <td><input type="email" name="correo_form" id="correo_form" required></td>
                    <td><label for="id_form">Contraseña:</label></td>
                    <td><input type="password" name="contra_form" id="contra_form" required></td>
                    </tr>
                    <td><label for="id_form">Dirección:</label></td>
                    <td colspan="3"><input type="text" name="direccion_form" id="direccion_form" required></td>
                    <tr>
                    <td><label for="id_form">Teléfono:</label></td>
                    <td><input type="number" name="telefono_form" id="telefono_form" required></td>
                    <td><label for="id_form">Título</label></td>
                    <td><input type="text" name="titulo_form" id="titulo_form" required></td>
                    </tr>
                    <tr>
                    <td><label for="id_form">Seguro:</label></td>
                    <td><select name="seguro_form" id="seguro_form">
                        <?php
                            $consulta = "SELECT * FROM rrhh.SeguroMedico";
                            $rpta = sqlsrv_query($con, $consulta);
                            while($fila_seguro = sqlsrv_fetch_array($rpta)){
                                echo "<option value='".$fila_seguro['idSeguro']."'>".$fila_seguro['tipoSeguro']."</option>";
                            }
                        ?>
                        
                    </select></td>
                    
                    <td><label for="id_form">Puesto:</label></td>
                    <td><select name="puesto_form" id="puesto_form">
                        <?php
                            $consulta = "SELECT * FROM rrhh.puesto";
                            $rpta = sqlsrv_query($con, $consulta);
                            while($fila_puesto = sqlsrv_fetch_array($rpta)){
                                echo "<option value='".$fila_puesto['idPuesto']."'>".$fila_puesto['nombrePuesto']."</option>";
                            }
                        ?>
                    </select></td>
                    </tr>
                    <tr>
                    <td><label for="id_form">Sede:</label></td>
                    <td colspan="3"><select name="sede_form" id="sede_form">
                        <?php
                            $consulta = "SELECT * FROM rrhh.sede s 
                            inner join rrhh.area a on s.idArea=a.idArea
                            inner join rrhh.Pais p on s.idPais = p.idPais";
                            $rpta = sqlsrv_query($con, $consulta);
                            while($fila_sede = sqlsrv_fetch_array($rpta)){
                                echo "<option value='".$fila_sede['idSede']."'>".$fila_sede['distrito']." - ".$fila_sede['ciudad'].", ".$fila_sede['nombrePais']." (".$fila_sede['nombreArea'].")</option>";
                            }
                        ?>
                    </select></td>
                    <tr>
                    <td><label for="id_form">Fecha de Ingreso:</label></td>
                    <td><input type="date" name="f_ingreso_form" id="f_ingreso_form" required></td>
                    <td><label for="id_form">Fin de contrato:</label></td>
                    <td><input type="date" name="fin_contrato_form" id="fin_contrato_form" required></td>
                    </tr>
                </table>
                <input type="submit" class="btn_enviar" name="btn_enviar" id="btn_enviar" value="Enviar">
            </form>
            <?php

                if(isset($_POST['btn_enviar'])){
                    //Tomamos todos los datos que hay
                    $id = $_POST['id_form'];
                    $nombre = $_POST['nombre_form'];
                    $apellido = $_POST['apellido_form'];
                    $correo = $_POST['correo_form'];
                    $contra = $_POST['contra_form'];
                    $direccion = $_POST['direccion_form'];
                    $telefono = $_POST['telefono_form'];
                    $titulo = $_POST['titulo_form'];
                    $seguro = $_POST['seguro_form'];
                    $puesto = $_POST['puesto_form'];
                    $sede = $_POST['sede_form'];
                    $f_ingreso = $_POST['f_ingreso_form'];
                    $fin_contrato = $_POST['fin_contrato_form'];
                    
                    //1 opc. El id está vacío: Se crea nuevo empleado
                    if($id==null){
                        /*
                        $sql = "INSERT INTO rrhh.Empleado VALUES ('$nombre', '$apellido', '$correo', '$contra',
                        '$titulo','$f_ingreso','$direccion','$telefono','$fin_contrato','$puesto','$seguro','$area','$sede')";
                        */
                        $sql = "EXEC usp_llenar_empleado '$nombre','$apellido','$correo','$contra','$titulo','$f_ingreso','$direccion','$telefono','$fin_contrato',$puesto,$seguro,$sede";
                        /*EXEC usp_llenar_empleado 'Pepe Botellas','Valdivia Huamaní','pepe@gmail.com','123456','Dr. Filosofía','2022-07-23','Al costado de Chura','999999999','2028-04-13',2,2,2
*/
                    }
                    //2 opc. El id está lleno: Se actualiza empleado
                    else{
                        /*
                        $sql = "UPDATE rrhh.Empleado SET nombresEmpleado='$nombre',apellidosEmpleado='$apellido',
                        correoElectronico='$correo', contraseña='$contra', titulo='$titulo', fechaIngreso='$f_ingreso',
                        direccion='$direccion', telefono='$telefono', vencimientoContrato='$fin_contrato', idPuesto='$puesto',
                        idSeguro='$seguro',idSede='$sede' WHERE idEmpleado = $id";
                        */
                        $sql = "EXEC usp_actualizar_empleado $id,'$nombre','$apellido','$correo','$contra','$titulo','$f_ingreso','$direccion','$telefono','$fin_contrato',$puesto, $seguro, $sede";
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
        </div>
        <div class="tab_empleados">
            <h3>TABLA DE EMPLEADOS REGISTRADOS</h3>
            <table class="table">
            <tr>
                <th class="th_id">ID</th>
                <th>NOMBRES</th>
                <th>FECHA INGRESO</th>
                <th>CORREO</th>
                <th>DIRECCIÓN</th>
                <th>TELÉFONO</th>
                <th>TÍTULO</th>
                <th>PUESTO</th>
                <th>SEGURO</th>
                <th>AREA</th>
                <th>SEDE</th>
                <th>FIN DE CONTRATO</th>
                <th>EDITAR || ELIMINAR</th>
            </tr>
                <!--Llenar la tabla con todos los datos-->
                <?php
                $sql="SELECT * FROM rrhh.Empleado";
                $rpta=sqlsrv_query($con,$sql);
                while($f_empleado = sqlsrv_fetch_array($rpta)){
                    $f_ing_actual = $f_empleado['fechaIngreso']->format("Y/m/d");
                    $f_sal_actual = $f_empleado['vencimientoContrato']->format("Y/m/d");
                    ?>
                    <tr>
                    <td><?php echo $f_empleado['idEmpleado']; ?></td>
                    <td><?php echo $f_empleado['nombresEmpleado']." ".$f_empleado['apellidosEmpleado']; ?></td>
                    <td><?php echo $f_ing_actual; ?></td>
                    <td><?php echo $f_empleado['correoElectronico']; ?></td>
                    <td><?php echo $f_empleado['direccion']; ?></td>
                    <td><?php echo $f_empleado['telefono']; ?></td>
                    <td><?php echo $f_empleado['titulo']; ?></td>
                    <td><?php echo $f_empleado['idPuesto']; ?></td>
                    <td><?php echo $f_empleado['idSeguro']; ?></td>
                    <td><?php echo $f_empleado['idArea']; ?></td>
                    <td><?php echo $f_empleado['idSede']; ?></td>
                    <td><?php echo $f_sal_actual; ?></td>
                    <td>
                        <!--Btn para borrar y eliminar-->
                    <form action="" method="POST">
                        <input type="text" value="<?php echo $f_empleado['idEmpleado'] ?>" name="id_modificar"  hidden>
                        <input type="submit" name="btn_editar" class="btn_mod btn_editar" value="Editar">
                        <input type="submit" name="btn_eliminar" class="btn_mod btn_eliminar" value="Eliminar">
                    </form>

                </td>
            </tr>
                <?php
                }

                if(isset($_POST['btn_editar'])){
                    $idMod = $_POST['id_modificar'];
                    $sql = "SELECT * FROM rrhh.empleado WHERE idEmpleado = ".$idMod;
                    $rpta = sqlsrv_query($con,$sql);
                    $col = sqlsrv_fetch_array($rpta);
                    ?>
                    <script>
                        inp = document.getElementById("id_form");
                        inp.value = "<?php echo $col['idEmpleado'] ?>";
                        
                        inp2 = document.getElementById("nombre_form");
                        inp2.value = "<?php echo $col['nombresEmpleado'] ?>";

                        inp3 = document.getElementById("apellido_form");
                        inp3.value = "<?php echo $col['apellidosEmpleado'] ?>";

                        inp4 = document.getElementById("correo_form");
                        inp4.value = "<?php echo $col['correoElectronico'] ?>";

                        inp5 = document.getElementById("contra_form");
                        inp5.value = "<?php echo $col['contraseña'] ?>";

                        inp6 = document.getElementById("direccion_form");
                        inp6.value = "<?php echo $col['direccion'] ?>";

                        inp7 = document.getElementById("telefono_form");
                        inp7.value = "<?php echo $col['telefono'] ?>";
                        
                        inp8 = document.getElementById("titulo_form");
                        inp8.value = "<?php echo $col['titulo'] ?>";

                        inp9 = document.getElementById("seguro_form");
                        inp9.value = "<?php echo $col['idSeguro'] ?>";

                        inp10 = document.getElementById("puesto_form");
                        inp10.value = "<?php echo $col['idPuesto'] ?>";

                        inp11 = document.getElementById("area_form");
                        inp11.value = "<?php echo $col['idArea'] ?>";

                        inp12 = document.getElementById("sede_form");
                        inp12.value = "<?php echo $col['idSede'] ?>";

                        
                    </script>
                    <?php
                }
                if (isset($_POST['btn_eliminar'])){
                    $id = $_POST['id_modificar'];
                    $sql = "exec usp_eliminar_empleado ".$id;
                    $rpta = sqlsrv_query($con, $sql);
                    if($rpta){
                        echo "Empleado Eliminado.";
                    }else{
                        echo "Error.";
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