<?php
     session_start(); // Iniciando sesion
     if( ! isSet($_SESSION['logueado']) ){
        header('Location: http://localhost:8080/noticias');
     }
     include_once('secciones/encabezado.php');
     include_once('secciones/menu.php');
?>

	<section id="contenido">
        <form id="alta"  action="uploader.php" method="POST" enctype="multipart/form-data">
            Titulo: <br>
            <input type="text" name="titulo" id="titulo" size="100"><br>
            Contenido: <br>
            <textarea name="texto" id="texto" rows="3" cols="75">
                
            </textarea><br>
            Fecha: <br>
            <input type="text" name="fecha" id="fecha"><br>
            Imagen: <br>

            <input type="hidden" name="MAX_FILE_SIZE" value="200000">
            <input type="file" name="imagen" id="imagen"> <br> <br>
            <button type='submit' value="Guardar" name="guardar" id="guardar">Guardar</button>
             <button type='button' onclick="window.location.href='ppal.php'">Cancelar</button>

            

        </form>

      <?php 
        if ((isSet($_SESSION['error']))&&($_SESSION['error'])!='') {
            echo $_SESSION['error'];
            $_SESSION['error']='';
        }
       ?>
	</section>

<?php
     include_once('secciones/footer.php');
     include_once('secciones/pie.php');
?>

