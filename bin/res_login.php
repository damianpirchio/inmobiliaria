<?php
	require 'rb.php';
	R::setup( 'mysql:host=localhost;dbname=pirchiopropiedades', 'root', 'pirchio' );//Conexion con BD
	
	//Seteo variables POST
	$user = $_POST['user'];
    $pass = $_POST['pass'];
	
	//Obtengo el registro en la tabla donde coincidan tanto USER como PASS
	$login = R::findOne('usuarios',' user = ? AND pass = ? ', [$user,$pass]);
	
	//Compruebo el exito del login, redirecciono al abm en caso de exito, comunico en caso de fracaso.
    if($login != NULL) {
		echo "<script> window.location.assign('../abm.php'); </script>";
    } else {
        echo "Login incorrecto, haga click <a href='../login.html'>aqu&iacute;</a> para regresar al mismo";
    }	
	
	R::close();	
	
?>