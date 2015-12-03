<?php

require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=pirchiopropiedades', 'root', 'pirchio' );

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

$inmuebles=R::dispense('inmuebles');

$inmuebles->TIPOINMUEBLE = $type_inm;
$inmuebles->PROVINCIA = $state;
$inmuebles->LOCALIDAD = $loc;
$inmuebles->DIRECCION = $address;
$inmuebles->VENTA = $sell_bool;
$inmuebles->ALQUILER = $rent_bool;
$inmuebles->MONTOVENTA = $sell_val;
$inmuebles->MONTOALQUILER = $rent_val;
$inmuebles->SUPERFICIECUBIERTA = $cov_sur;
$inmuebles->SUPERFICIETERRENO = $terr_sur;

R::store($inmuebles);	
	
echo "<script> window.location.assign('http://localhost/entrada.html'); </script>"

?>