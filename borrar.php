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
	
	$id=$_GET['id'];//Obtengo el ID a editar
	
	$inmueble = R::load( 'inmueble', $id );//Abro el registro en la tabla con dicho ID	
	
	R::trash($inmueble);//Reviento el registro en la tabla.
	$db->disconnect();	//Cierro conexion
	
	//Redirecciono al ABM
	echo "<script> window.location.assign('abm.php'); </script>"	

?>