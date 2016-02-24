<?php

	include_once 'includes/autoloader.php';
	include_once 'includes/rb.php';
	
	$db = Database::getInstance();
	$db->connect();
	//Obtengo el ID a borrar
	$id = $_GET['id'];
	//Abro el registro en la tabla con dicho ID	
	$inmueble = R::load( 'inmueble', $id );
	//Reviento el registro en la tabla.
	R::trash($inmueble);	
	$db->disconnect();	
	//Redirecciono al ABM
	echo "<script> window.location.assign('abm.php'); </script>"
?>
