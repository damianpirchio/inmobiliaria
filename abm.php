<?php

	include_once 'includes/autoloader.php';
	include_once 'includes/rb.php';

	$db = Database::getInstance();
	$db->connect();	
	$inmuebles = R::findAll( 'inmueble' ); //Obtiene todos los registros de la tabla
	
	function enumDropdown($table_name, $column_name, $echo = false)
	{
		$tiposInm=R::getAll( "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
							  WHERE TABLE_NAME = '".$table_name."' AND COLUMN_NAME = '".$column_name."'" );
		
		$selectDropdown = "<select name=\"$column_name\">";
		$enumList = explode(",", str_replace("'", "", substr($tiposInm[0]['COLUMN_TYPE'], 5, (strlen($tiposInm[0]['COLUMN_TYPE'])-6))));

		foreach($enumList as $value){
			$capValue=ucwords($value);
			$selectDropdown .= "<option value=\"$capValue\">$capValue</option>";
		}

		$selectDropdown .= "</select>";

		if ($echo)
			echo $selectDropdown;

		return $selectDropdown;
	}
?>
<!DOCTYPE html>
<html lang="es">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="ABM">
		<meta name="author" content="Webing Planners">
		<!-- CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/main.css">
		<!-- Fuentes y Favicon -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<title>ABM - Pirchio Propiedades</title>

	</head>

	<body>

		<h1>Bienvenido</h1>

		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<p style="text-align:center">INGRESAR UN NUEVO INMUEBLE</p>
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary btn-block" onclick="window.location.href='entrada.php'">Agregar</button>
				</div>
			</div>
			<div class="row">
				<hr>
			</div>
			<div class="row">
				<form class="form-inline" action="" method="post" role="form">
					<div class="form-group">
						<label for=""><h4>FILTROS</h4></label>
					</div>
					<div class="form-group">
						<label for="tipo-operacion">Operación</label>
						<select class="form-control" name="tipo-operacion">
							<option name="op-venta" value="">VENTA</option>
							<option name="op-alquiler" value="">ALQUILER</option>
							<option name="op-ambas" value="">VENTA/ALQUILER</option>
						</select>
					</div>
				

					<div class="form-group">
						<label for="tipo-inmueble">Tipo de Inmueble</label>
						<?php
						echo enumDropdown('inmueble','tipoinmueble');
						?>
					</div>
				</form>
			</div>
			<div class="row">
				<hr>
			</div>
			<div class="row">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>TIPO OP</th>
							<th>TIPO INMUEBLE</th>
							<th>DIRECCION</th>
							<th>IMAGEN</th>
							<th>OPERACIONES</th>
						</tr>
					</thead>

					<tbody>
						<?php
							//Recorro todos los registros del array resultado
							foreach ($inmuebles as $inmueble){
						?>
						<tr>
							<td>
								<?php
									if ($inmueble->venta!=NULL AND $inmueble->alquiler==NULL)
										echo "Venta";
									elseif ($inmueble->alquiler!=NULL AND $inmueble->venta==NULL)
										echo "Alquiler";
									elseif ($inmueble->alquiler!=NULL AND $inmueble->venta!=NULL)
										echo "Venta y Alquiler";
								?>
							</td>
							<td>
								<?php 
									//Esta funcion es para capitalizar la palabra, asi queda mas bonito
									print ucwords($inmueble->tipoinmueble);  
								?>
							</td>
							<td>
								<?php 
									print $inmueble->direccion; 
								?>
							</td>
							<td>
								-
							</td>
							<td>
								<!-- Aca "sobrecargo" la url de entrada, que luego comprobara si tiene parametro GET o no y funcionara acorde, si se les ocurre una mejor forma, avisen.-->
								<a href="#" title="Ver"><i class="fa fa-file-text-o"></i></a>&nbsp&nbsp&nbsp
								<a href="entrada.php?id=<?php echo $inmueble->id; ?>" title="Editar"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp&nbsp
								<a href="borrar.php?id=<?php print $inmueble->id; ?>" title="Borrar"><i class="fa fa-times"></i></a>

							</td>
						</tr>

					</tbody>
					<?php
						}
						$db->disconnect();
					?>
				</table>
			</div>

		</div> <!-- container end -->

		<!-- Footer -->

		<footer>
			<div class="container">
				<div class="foot-arriba">
					<div class="row">
						<div class="col-md-4">
							<h1>Pirchio Propiedades</h1>
						</div>
						<div class="col-md-6 text-left">
							<div class="row"><h6><i class="fa fa-map-marker"></i>&nbsp&nbsp 101 N°93 Oeste - General Pico (L.P)</h6></div>
							<div class="row"><h6><i class="fa fa-phone"></i>&nbsp&nbsp 431112 - (2302) 511455&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-clock-o"></i>&nbsp&nbsp L a V: 9:00 - 12:00 | 16:00 - 20:00</h6></div>

						</div>
						<div class="col-md-2">
							SEGUINOS
							<div class="row">
								<div><h1><a href="https://www.facebook.com/pirchio.propiedades"><i class="fa fa-facebook-square"></i></a>&nbsp&nbsp <a href="#"><i class="fa fa-twitter-square"></i></a></h1></div>

							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="foot-abajo">
					<h6>
						 <i class="fa fa-copyright"></i>&nbsp 2015 &nbsp<a href="www.damianpirchio.com">damianpirchio</a>&nbsp|&nbspTodos los derechos reservados.
					</h6>
				</div>
			</div> <!-- container -->
		</footer>
	</body>

</html>
