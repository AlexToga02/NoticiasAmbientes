<?php
    session_start(); // Iniciando sesion

    include_once("conexion.php");
    
    $cta = $_POST['cuenta'];
    $cve = $_POST['clave'];

    $sql = "SELECT * FROM usuario WHERE nombre_cuenta = '$cta' and 
             clave = '$cve'";

    $query = mysql_query($sql,$con);
 
    $row = mysql_fetch_assoc($query);

    if (! $row ){ 
        $_SESSION['error']='cuenta/clave incorrecta';
        header('Location: http://localhost:8080/noticias');
    }else{
        $_SESSION['logueado'] = true;  	
        $_SESSION['usuario'] = $row['nombre_usuario'];  	
        header('Location: http://localhost:8080/noticias/ppal.php');       
    }
?>