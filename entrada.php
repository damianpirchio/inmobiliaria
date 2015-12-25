<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Entrada de datos">
    <meta name="author" content="Webing Planners">
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Fuentes y Favicon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Entrada de datos - Pirchio Propiedades</title>

</head>

<body>
    <div class="form-wrapper">
        <div class="container">



        </div>
    </div>

<?php
	//require '/includes/rb.php';
	
	spl_autoload_register(function ($class) {
        include_once('includes/' . $class . '.class.php');
    });

	if(ISSET($_GET["id"])){

		R::setup( 'mysql:host=localhost;dbname=pirchiopropiedades', 'root', 'pirchio' );//Conexion con BD
		$id=$_GET["id"];
		//Aqui, en caso de que exista el parametro ID se obtiene dicho registro para rellenar el formulario, sino lo escribe vacio y funciona como simple entrada de datos.
		$inmueble = R::findOne('inmuebles',' id = ? ', [$id]);

		?>

        <form action="bin/edicion.php" method="post" role="form">
			<div>
				<label>Tipo Inmueble</label>
				<?php
				print $inmueble->tipoinmueble;
					switch($inmueble->tipoinmueble) {
						case 'casa':
							?>
								<select name="type" class="form-control">
								  <option selected="selected" value="casa">Casa</option>
								  <option value="depto">Departamento</option>
								  <option value="campo">Campo</option>
								  <option value="terreno">Terreno</option>
								  <option value="quinta">Casa Quinta</option>
								  <option value="local">Local Comercial</option>
								</select>
							<?php
						break;
						case 'depto':
							?>
								<select name="type" class="form-control">
								  <option value="casa">Casa</option>
								  <option selected="selected" value="depto">Departamento</option>
								  <option value="campo">Campo</option>
								  <option value="terreno">Terreno</option>
								  <option value="quinta">Casa Quinta</option>
								  <option value="local">Local Comercial</option>
								</select>
							<?php
						break;
						case 'campo':
							?>
								<select name="type" class="form-control">
								  <option value="casa">Casa</option>
								  <option value="depto">Departamento</option>
								  <option selected="selected" value="campo">Campo</option>
								  <option value="terreno">Terreno</option>
								  <option value="quinta">Casa Quinta</option>
								  <option value="local">Local Comercial</option>
								</select>
							<?php
						break;
						case 'terreno':
							?>
								<select name="type" class="form-control">
								  <option value="casa">Casa</option>
								  <option value="depto">Departamento</option>
								  <option value="campo">Campo</option>
								  <option selected="selected" value="terreno">Terreno</option>
								  <option value="quinta">Casa Quinta</option>
								  <option value="local">Local Comercial</option>
								</select>
							<?php
						break;
						case 'quinta':
							?>
								<select name="type" class="form-control">
								  <option value="casa">Casa</option>
								  <option value="depto">Departamento</option>
								  <option value="campo">Campo</option>
								  <option value="terreno">Terreno</option>
								  <option selected="selected" value="quinta">Casa Quinta</option>
								  <option value="local">Local Comercial</option>
								</select>
							<?php
						break;
						case 'local':
							?>
								<select name="type" class="form-control">
								  <option value="casa">Casa</option>
								  <option value="depto">Departamento</option>
								  <option value="campo">Campo</option>
								  <option value="terreno">Terreno</option>
								  <option value="quinta">Casa Quinta</option>
								  <option selected="selected" value="local">Local Comercial</option>
								</select>
							<?php
						break;
						case ''://Este case no se deberia dar nunca, dado que deberia ser imposible que no se obtenga el dato del SELECT, pero mejor que sobre y que no falte :D
							?>
								<select name="type" class="form-control">
								  <option value="casa">Casa</option>
								  <option value="depto">Departamento</option>
								  <option value="campo">Campo</option>
								  <option value="terreno">Terreno</option>
								  <option value="quinta">Casa Quinta</option>
								  <option value="local">Local Comercial</option>
								</select>
							<?php
						break;

					}
				?>

			</div>
			<div>
				<label>Provincia</label>
				<input name="state" value="<?php print $inmueble->provincia ?>" type="text" class="form-control" autocomplete="off" required>
			</div>
			<div>
				<label>Localidad</label>
				<input name="loc" value="<?php print $inmueble->localidad ?>" type="text" class="form-control" autocomplete="off" required>
			</div>
			<div>
				<label>Direcci&oacute;n</label>
				<input name="address" value="<?php print $inmueble->direccion ?>" type="text" class="form-control" autocomplete="off" required>
			</div>
			<div>
				<label>Venta</label>
				<?php
					if($inmueble->venta!=NULL)
						print "<input name='sell_bool' type='checkbox' class='form-control' checked='checked' >";
					else
						print "<input name='sell_bool' type='checkbox' class='form-control' >";
				?>
			</div>
			<div>
				<label>Alquiler</label>
				<?php
					if($inmueble->alquiler!=NULL)
						print "<input name='rent_bool' type='checkbox' class='form-control' checked='checked' >";
					else
						print "<input name='rent_bool' type='checkbox' class='form-control' >";
				?>
			</div>
			<div>
				<label>Monto Venta (no se muestra al publico)</label>
				<input name="sell_val" value="<?php print $inmueble->montoventa ?>" type="number" class="form-control" autocomplete="off" >
			</div>
			<div>
				<label>Monto Alquiler (no se muestra al publico)</label>
				<input name="rent_val" value="<?php print $inmueble->montoalquiler ?>" type="number" class="form-control" autocomplete="off" >
			</div>
			<div>
				<label>Superficie Cubierta</label>
				<input name="cov_sur" value="<?php print $inmueble->superficiecubierta ?>" type="text" class="form-control" autocomplete="off" >
			</div>
			<div>
				<label>Superficie Terreno</label>
				<input name="terr_sur" value="<?php print $inmueble->superficieterreno ?>" type="text" class="form-control" autocomplete="off" >
			</div>
			<div>
				<button type="submit" class="btn btn-default">Enviar</button>
			</div>
			<input type="hidden" name="id" value="<?php print $id ?>">
		</form>
		<?php
	}else {
		
		if (isset($_POST['state']) AND isset($_POST['loc']) AND isset($_POST['address'])) {

			$datos = array_merge(array(), $_POST);
			
			$inmueble = new Inmueble($datos);
			
			echo "<script> window.location.assign('abm.php'); </script>";
		}
		?>
			<form action="" method="post" role="form">
				<div>
					<label>Tipo Inmueble</label>
					<select name="type" class="form-control">
					  <option value="casa">Casa</option>
					  <option value="depto">Departamento</option>
					  <option value="campo">Campo</option>
					  <option value="terreno">Terreno</option>
					  <option value="quinta">Casa Quinta</option>
					  <option value="local">Local Comercial</option>
					</select>
				</div>
				<div>
					<label>Provincia</label>
					<input name="state" type="text" class="form-control" autocomplete="off" required>
				</div>
				<div>
					<label>Localidad</label>
					<input name="loc" type="text" class="form-control" autocomplete="off" required>
				</div>
				<div>
					<label>Direcci&oacute;n</label>
					<input name="address" type="text" class="form-control" autocomplete="off" required>
				</div>
				<div>
					<label>Venta</label>
					<input name="sell_bool" type="checkbox" class="form-control" >
				</div>
				<div>
					<label>Alquiler</label>
					<input name="rent_bool" type="checkbox" class="form-control" >
				</div>
				<div>
					<label>Monto Venta (no se muestra al publico)</label>
					<input name="sell_val" type="number" class="form-control" autocomplete="off" >
				</div>
				<div>
					<label>Monto Alquiler (no se muestra al publico)</label>
					<input name="rent_val" type="number" class="form-control" autocomplete="off" >
				</div>
				<div>
					<label>Superficie Cubierta</label>
					<input name="cov_sur" type="text" class="form-control" autocomplete="off" >
				</div>
				<div>
					<label>Superficie Terreno</label>
					<input name="terr_sur" type="text" class="form-control" autocomplete="off" >
				</div>
				<div>
					<button type="submit" class="btn btn-default">Enviar</button>
				</div>
			</form>
		<?php
	}

?>
</body>
</html>
