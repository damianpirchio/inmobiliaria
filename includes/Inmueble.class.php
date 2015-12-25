<?php

	require('rb.php');

	spl_autoload_register(function ($class) {
        include_once($class . '.class.php');
    });

	$db = Database::getInstance();
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
		function __construct($datos) {
			
			$type_inm = $datos['type'];
			$state = $datos['state'];
			$loc = $datos['loc'];
			$address = $datos['address'];
			
			if(ISSET($datos['sell_bool'])) {
				$sell_bool = $datos['sell_bool'];
			}else{
				$sell_bool = NULL;
			}
			if(ISSET($datos['rent_bool'])) {
				$rent_bool = $datos['rent_bool'];
			}else{
				$rent_bool = NULL;
			}
			if(ISSET($datos['rent_val'])) {
				$rent_val = $datos['rent_val'];
			}else{
				$rent_val = NULL;
			}
			if(ISSET($datos['sell_val'])) {
				$sell_val = $datos['sell_val'];
			}else{
				$sell_val = NULL;
			}
			if(ISSET($datos['cov_sur'])) {
				$cov_sur = $datos['cov_sur'];
			}else{
				$cov_sur = NULL;
			}
			if(ISSET($datos['terr_sur'])) {
				$terr_sur = $datos['terr_sur'];
			}else{
				$terr_sur = NULL;
			}
			
			$inmueble=R::dispense('inmueble');

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

			R::store($inmueble);
		}
	}

	$db->disconnect();
?>
