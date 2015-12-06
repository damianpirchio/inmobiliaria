<?php

	require 'rb.php';
	R::setup( 'mysql:host=localhost;dbname=pirchiopropiedades', 'root', 'pirchio' );//Conexion con BD
	
	$id=$_POST['id'];//Obtengo el ID a editar
	
	$inmueble = R::load( 'inmuebles', $id );//Abro el registro en la tabla con dicho ID
	
	//Seteo las variables.
	$type_inm = $_POST['type'];
	$state = $_POST['state'];
	$loc = $_POST['loc'];
	$address = $_POST['address'];
	$sell_bool = $_POST['sell_bool'];
	$rent_bool = $_POST['rent_bool'];
	$sell_val = $_POST['sell_val'];
	$rent_val = $_POST['rent_val'];
	$cov_sur = $_POST['cov_sur'];
	$terr_sur = $_POST['terr_sur'];
	
	//Escribo variables en el array registro.
	$inmueble->TIPOINMUEBLE = $type_inm;
	$inmueble->PROVINCIA = $state;
	$inmueble->LOCALIDAD = $loc;
	$inmueble->DIRECCION = $address;
	$inmueble->VENTA = $sell_bool;
	$inmueble->ALQUILER = $rent_bool;
	$inmueble->MONTOVENTA = $sell_val;
	$inmueble->MONTOALQUILER = $rent_val;
	$inmueble->SUPERFICIECUBIERTA = $cov_sur;
	$inmueble->SUPERFICIETERRENO = $terr_sur;

	//Guardo el registro en la tabla y cierro conexion con BD.
	R::store($inmueble);		
	R::close();	
	
	//Redirecciono al ABM.
	echo "<script> window.location.assign('../abm.php'); </script>"	

?>