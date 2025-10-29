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
    <title>SGS</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <header>
        <?php
        require("header.php");
        ?>
    </header>
    <article class="index">
        <h1>BIENVENIDO <?php echo strtoupper($_SESSION['usuario']) ?></h1>
        <h1>SGS EN PERÚ</h1>
        <p>
        El año 1986 empezamos a operar en la ciudad de Lima con un pequeño equipo de 40 empleados. 
        Hoy, la sede peruana de SGS es una de las más importantes, donde todas las actividades de 
        la región sudamericana son centralizadas y coordinadas.
        <br><br>
        En la actualidad, estamos presentes en 28 ciudades del Perú, con cerca de 2,000 empleados, ofreciendo una rango amplio de soluciones a prácticamente todo sector e industria existente, incluyendo medioambiente, agricultura, minería, industrial, pesca, certificación de sistemas de gestión, productos de consumo, automotriz y, petróleo, gas y productos químicos.
        </p>
        <h1>INNOVACIÓN</h1>
        <p>
        Estamos dedicados a desarrollar nuestros servicios de tal modo que satisfaga las necesidades del Mercado peruano. Por ejemplo, en el sector minero desarrollamos un sistema de información que provee resultados de laboratorio a nuestros clientes en tiempo real.
        <br>
        Todos nuestros métodos de ensayo se rigen bajo normativas locales y globales, y pueden también adaptarse a los requerimientos específicos de cada cliente.
        </p>
        <h1>NUESTRA VISIÓN</h1>
        <p>Aspiramos a ser la organización de servicios más competitiva y más productiva del mundo. Nuestras competencias clave en inspección, verificación, ensayos y certificación se someten a un proceso de mejora continua para mantenernos a la vanguardia del sector. Son la médula espinal de nuestra identidad. Los mercados de elección están determinados únicamente por nuestra capacidad de ser los más competitivos, y de ofrecer sistemáticamente servicios sin rival a nuestros clientes de todo el mundo.</p>
        <h1>NUESTROS VALORES</h1>
        <p>Procuramos ser la personificación de la pasión, la integridad, la innovación y el espíritu emprendedor, esforzándonos continuamente por llevar a la práctica nuestra visión. Estos valores nos guían en todo lo que hacemos, y son la roca en la que descansa nuestra organización.

</p>
    </article>
    <footer>
        <?php
        require("footer.php");
        ?>
    </footer>
</body>
</html>
<?php
}else{
    header("location: login.php");
}
?>