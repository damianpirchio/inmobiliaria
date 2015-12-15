<?php

	spl_autoload_register(function ($class) {
        include_once('includes/' . $class . '.class.php');
    });
	
	$db = new Database;
	$db->connect();
	
	class Inmueble{
		
		// Atributos ---------------------------
		private $type_inm;
		private $state;
		private $loc;
		private $address;
		private $sell_bool;
		private $rent_bool;
		private $sell_val;
		private $rent_val;
		private $cov_sur;
		private $terr_sur;

		// Métodos -----------------------------
		function alta(){
				
		}
	}
	
	$db->disconnect();
?>