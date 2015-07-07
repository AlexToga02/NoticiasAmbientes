<?php
     session_start(); // Iniciando sesion
     if( ! isSet($_SESSION['logueado']) ){
        header('Location: http://localhost:8080/noticias');
     }
     include_once('conexion.php');
     	$sql="SELECT * from noticia";
		$query=mysql_query($sql,$con);

     include_once('secciones/encabezado.php');
     include_once('secciones/menu.php');
?>

<section id="contenido">
	<table>
		<tr>
			<th>Titulo</th>
			<th>Contenido</th>
			<th>Fecha</th>
			<th>Imagen</th>
		</tr>
		<tbody>
			<?php 
					while ( $row =mysql_fetch_array($query, MYSQL_ASSOC)) {
						echo "<tr>";
						echo "<td>$row[titulo]</td>";

						?>

						<td><div id="resumen" style="display: inline "><?php echo substr($row['contenido'], 0,20).'...'; ?></div>
							<div id="completo" style="display: none"><?php echo $row['contenido']; ?></div>
							<button id="boton" >Ver más</button>
						</td>


						<?php
						echo "<td>$row[fecha]</td>";
						echo "<td><img src='$row[imagen]' width='150' height='150'></td>";
						?>
						<td><a class="btn" href="elimina.php?id=<?php echo $row['idnoticia']; ?>">Eliminar</a></td>
						
						<?php
					
						echo "</tr>";


					}





			 ?>
		</tbody>
	</table>
</section>



<?php
     include_once('secciones/footer.php');
     include_once('secciones/pie.php');
?>

<script>
$( "#boton" ).click(function() {

  $( "#completo" ).toggle(function(){
  	$("#boton").html("Ver menos");
  });
  $("#resumen").toggle(function(){
  }); 

});


</script>
