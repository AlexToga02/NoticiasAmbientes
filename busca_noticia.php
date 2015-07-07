<?php
	include_once('conexion.php');
	$cad= $_GET['term'];

	$sql="SELECT titulo as value, idnoticia as id
	from noticia where titulo like '%".$cad."%'";

	$query=mysql_query($sql);
	
	while ( $row = mysql_fetch_array($query,MYSQL_ASSOC) ) {
		$rows[]=$row;
	}
	echo json_encode($rows);
 ?>