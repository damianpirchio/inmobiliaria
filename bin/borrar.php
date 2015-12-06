<?php

	require 'rb.php';
	R::setup( 'mysql:host=localhost;dbname=pirchiopropiedades', 'root', 'pirchio' );//Conexion con BD
	
	$id=$_GET['id'];//Obtengo el ID a editar
	
	$inmueble = R::load( 'inmuebles', $id );//Abro el registro en la tabla con dicho ID	
	
	R::trash($inmueble);//Reviento el registro en la tabla.
	R::close();	//Cierro conexion
	
	//Redirecciono al ABM
	echo "<script> window.location.assign('/inmobiliaria/abm.php'); </script>"	

?>