
<?php 
 session_start();

	function archivo(){
			$exito=true;
			$size=$_FILES['imagen']['size'];
			$type=$_FILES['imagen']['type'];
			$msg="";

			global $add,$nombre;

			if($size > 200000){
				$msg =$msg."El archivo es mayor a 200k";
				$exito=false;

			}
			if ( !($type == "image/jpeg" or $type == "image/jpg" or $type == "image/JPG" or $type == "image/JPEG" or $type == "image/gif") ){
				$msg =$msg."El archivo solo puede ser jpg o gif <br>";
				$exito=false;
			}

				$name=$_FILES['imagen']['name'];
				$add = "img/".$name;

				if ( $exito ){
					if(move_uploaded_file($_FILES['imagen']['tmp_name'],$add))
					{
						return true;
					}else { 
						
						$_SESSION['error']="Error al subir el archivo";
						return false;
					}
				}else {
					$_SESSION['error']=$msg;
				
				}	
	}
//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------
	function graba($titulo,$texto,$fecha,$add){
		include_once('conexion.php');
		$sql="INSERT INTO noticia(titulo,contenido,fecha,imagen) values ('$titulo','$texto','$fecha','$add')";
		$query=mysql_query($sql,$con);

	}


//----------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------
	$titulo=$_POST['titulo'];
	$texto=$_POST['texto'];
	$fecha=$_POST['fecha'];
	$name=$_FILES['imagen']['name'];
	$add = "img/".$name;

	if ($titulo=='' or $texto=='' or $fecha=='' or $name=='') {
		$_SESSION['error']="Todos los campos son requeridos";
		header('Location: http://localhost:8080/noticias/altanoticia.php');
	}else{
		if(archivo()){
			graba($titulo,$texto,$fecha,$add);
			header('Location: http://localhost:8080/noticias');
		}else{
			header('Location: http://localhost:8080/noticias/altanoticia.php');
		}
			

	}



