<?php
session_start();
include("config/conexion.php");
if (isset($_SESSION['usuario'])) {
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN: SGS</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="box_login">
    <article class="login">
        <h1>Iniciar Sesión</h1>
        <div class="login_form">
            <form action="" method="post">
                <label for="">Correo</label>
                <input type="email" name="email_form" id="email_form" required>
                <label for="">Contraseña</label>
                <input type="password" name="contra_form" id="contra_form" required>
                <input type="submit" name="enviar_form" id="enviar_form" value="Iniciar Sesión">
            </form>
            <?php

            if (isset($_POST['enviar_form'])){
                $email = $_POST['email_form'];
                $contra = $_POST['contra_form'];

                $sql = "SELECT * FROM rrhh.Empleado WHERE correoElectronico='".$email."' and contraseña='".$contra."'";
                //idEmpleado, CONCAT(nombresEmpleado, ' ', apellidosEmpleado) nombre, correoElectronico, contraseña
                $rpta = sqlsrv_query($con,$sql,array(), array( "Scrollable" => 'static' ));

                $filas = sqlsrv_num_rows($rpta);
                $persona = sqlsrv_fetch_array($rpta);

                if($filas==0){
                    echo "Los datos no coinciden.";
                }
                else{
                    $_SESSION['usuario'] = $persona['nombresEmpleado'];
		            $_SESSION['id'] = $persona['idEmpleado'];
                    header("location: index.php");
                }

            }

            ?>
        </div>
    </article>
    <aside class="login_image">
        <img src="image/login.png" alt="Image Login">
    </aside>
    </div>
    <footer>
        <?php
        require("footer.php");
        ?>
    </footer>
</body>
</html>