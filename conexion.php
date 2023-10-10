<?php
    
	$mysql = new mysqli("localhost","root","","puntoneg_punto-negocio"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>