<?php

	require '/includes/rb.php';
	
	spl_autoload_register(function ($class) {
        include_once('includes/' . $class . '.class.php');
    });
	
	$db = new Database;
	$db->connect();

	$inmuebles = R::findAll( 'inmueble' );//Obtiene todos los registros de la tabla
?>
<!DOCTYPE html>
<html lang="es">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="ABM">
		<meta name="author" content="Webing Planners">

		<title>ABM - Pirchio Propiedades</title>

	</head>

	<body>
		<div>
			<label>Ingresar nuevo inmueble: </label>
			<button class="btn btn-default" onclick="window.location.href='entrada.php'">Nuevo</button>
		</div>
		</br>
		-------------------------------------------------------------------------------
		</br>
<?php
		foreach($inmuebles as $inmueble){//Recorro todos los registros del array resultado
			?>
				<div>
					<label>Tipo Inmueble: </label>
					<?php print ucwords($inmueble->tipoinmueble);//Esta funcion es para capitalizar la palabra, asi queda mas bonito ?>		
				</div>
				<div>
					<label>Provincia: </label>
					<?php print $inmueble->provincia; ?>
				</div>
				<div>
					<label>Localidad: </label>
					<?php print $inmueble->localidad; ?>
				</div>
				<div>
					<label>Direcci&oacute;n: </label>
					<?php print $inmueble->direccion; ?>
				</div>
				<div>
					<label>Tipo de Operaci&oacute;n: </label>
					<?php 
					
					if($inmueble->venta!=NULL AND $inmueble->alquiler==NULL) 
						echo "Venta";
					elseif($inmueble->alquiler!=NULL AND $inmueble->venta==NULL)
						echo "Alquiler";
					elseif($inmueble->alquiler!=NULL AND $inmueble->venta!=NULL)
						echo "Venta y Alquiler";
					?>
				</div>
				<div>
					<label>Monto Venta (no se muestra al publico): </label>
					<?php print $inmueble->montoventa; ?>
				</div>
				<div>
					<label>Monto Alquiler (no se muestra al publico): </label>
					<?php print $inmueble->montoalquiler; ?>
				</div>
				<div>
					<label>Superficie Cubierta: </label>
					<?php print $inmueble->superficiecubierta; ?>
				</div>
				<div>
					<label>Superficie Terreno: </label>
					<?php print $inmueble->superficieterreno; ?>
				</div>
				</br>
				<!-- Aca "sobrecargo" la url de entrada, que luego comprobara si tiene parametro GET o no y funcionara acorde, si se les ocurre una mejor forma, avisen.-->
				<a href="entrada.php?id=<?php echo $inmueble->id; ?>">Editar</a>&nbsp;<a href="bin/borrar.php?id=<?php print $inmueble->id; ?>">Borrar</a>
				</br>
				-------------------------------------------------------------------------------
				</br>
			<?php
		}

		R::close();
?>

	</body>
</html>