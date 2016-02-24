<?php

	$db = Database::getInstance();
	$db->connect();
	
	class Usuario{
		
		// Atributos ---------------------------
		private $name;
		private $pass;
		
		// Métodos -----------------------------
		function login($name_log, $pass_log){
			
			//Seteo los atributos con los parametros y defino el string $result que tendra el resultado del login
			$name = $name_log;
			$pass = $pass_log;
			$result = '';
			
			//Obtengo el registro en la tabla donde coincidan tanto USER como PASS
			$login = R::findOne('usuario',' login = ? AND pass = ? ', [$name,$pass]);
			
			//Compruebo el exito del login, redirecciono al abm en caso de exito, comunico en caso de fracaso.
			if ($login != NULL) {
				$result = "<script> window.location.assign('abm.php'); </script>";				
			} else {
				$result = "<script> window.location.assign('wrong_login.html'); </script>";
			}				
			return $result;
		}
	}
	
	$db->disconnect();	
?>
