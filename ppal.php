<?php
     session_start(); // Iniciando sesion
     if( ! isSet($_SESSION['logueado']) ){
        header('Location: http://localhost:8080/noticias');
     }
     include_once('secciones/encabezado.php');
     include_once('secciones/menu.php');
?>

	<section id="contenido">

	</section>

<?php
     include_once('secciones/footer.php');
     include_once('secciones/pie.php');
?>

