<?php 

 session_start(); // Iniciando sesion
     if( ! isSet($_SESSION['logueado']) ){
        header('Location: http://localhost:8080/noticias');
     }

     $id= $_GET['id'];
     include_once('conexion.php');

     	$sql="DELETE  from noticia where idnoticia=$id";
		$query=mysql_query($sql,$con);

		if($query){
			$_SESSION['error']='Registro Eliminado';

		}
		 header('Location: http://localhost:8080/noticias');

 ?>