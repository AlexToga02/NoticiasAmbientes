<?php
     include_once('secciones/encabezado.php');
      session_start();
?> 
<h1 class="titulo1"><img src="img/titulo1.png"></h1>
<section id="login">
    
	<form id="frm1" name="frm1" action="logueo.php" method="POST">
	    <label for="cuenta">Cuenta:</label><br>
		<input type="text" name="cuenta"><br>
        <label for="clave">Clave:</label> <br>
        <input type="password" name="clave">
        <br>


        <?php 
            if ((isset($_SESSION['error']))&&($_SESSION['error']!='')) {
                ?>
                <span id="error"><?php echo $_SESSION['error']; ?></span>
                <?php
                $_SESSION['error']='';
            }
         ?>
         <br>
        <button name="enviar">Validar</button>
	</form>


</section>
<br>
<br>
<?php
print_r($_POST);

    include_once('secciones/pie.php');
?>