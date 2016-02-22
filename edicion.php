<?php

	include_once 'rb.php';
	
	/*** Anulo todos los autoload existentes ***/
    spl_autoload_register(null, false);

    /*** especifico que extensiones se abriran ***/
    spl_autoload_extensions('.class.php');

    /*** clase Loader ***/
    function classLoader($class)
    {
        $filename = strtolower($class) . '.class.php';
        $file ='includes/' . $filename;
        if (!file_exists($file))
        {
            return false;
        }
        include $file;
    }

    /*** registro la funcion Loader ***/
    spl_autoload_register('classLoader');
	
	$db = Database::getInstance();
	$db->connect();
	
	$id=$_POST['id'];//Obtengo el ID a editar
	
	$inmueble = R::load( 'inmueble', $id );//Abro el registro en la tabla con dicho ID
	
	//Seteo las variables.
	if(ISSET($_POST['type_inm'])) {
		$type_inm = $_POST['type_inm'];
	}else{
		$type_inm = NULL;
	}
	if(ISSET($_POST['state'])) {
		$state = $_POST['state'];
	}else{
		$state = NULL;
	}
	if(ISSET($_POST['loc'])) {
		$loc = $_POST['loc'];
	}else{
		$loc = NULL;
	}
	if(ISSET($_POST['address'])) {
		$address = $_POST['address'];
	}else{
		$address = NULL;
	}	
	if(ISSET($_POST['sell_bool'])) {
		$sell_bool = $_POST['sell_bool'];
	}else{
		$sell_bool = NULL;
	}
	if(ISSET($_POST['rent_bool'])) {
		$rent_bool = $_POST['rent_bool'];
	}else{
		$rent_bool = NULL;
	}
	if(ISSET($_POST['rent_val'])) {
		$rent_val = $_POST['rent_val'];
	}else{
		$rent_val = NULL;
	}
	if(ISSET($_POST['sell_val'])) {
		$sell_val = $_POST['sell_val'];
	}else{
		$sell_val = NULL;
	}
	if(ISSET($_POST['cov_sur'])) {
		$cov_sur = $_POST['cov_sur'];
	}else{
		$cov_sur = NULL;
	}
	if(ISSET($_POST['terr_sur'])) {
		$terr_sur = $_POST['terr_sur'];
	}else{
		$terr_sur = NULL;
	}
	
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
	$db->disconnect();
	
	//Redirecciono al ABM.
	echo "<script> window.location.assign('abm.php'); </script>"	

?>