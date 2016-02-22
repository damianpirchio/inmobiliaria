<?php
    require 'rb.php';
	
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

	if (isset($_POST['user']) AND isset($_POST['pass'])) {

		$user = new Usuario;
		echo $user->login($_POST['user'],$_POST['pass']);
	}
?>
<!DOCTYPE html>
<html lang="es">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Login">
		<meta name="author" content="Webing Planners">
		<!-- CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/main.css">
		<!-- Fuentes y Favicon -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<title>Login - Pirchio Propiedades</title>

	</head>

	<body>

	<div class="form-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 div-form">
					<form action="" class="login-form form-horizontal" method="post" role="form">

						<div class="form-group">
							<label for="user" class="col-md-2 control-label">USUARIO</label>
							<div class="col-md-10">
								<input name="user" id="user" type="text" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label for="pass" class="col-md-2 control-label">CLAVE</label>
							<div class="col-md-10">
								<input name="pass" id="pass" type="password" class="form-control" required>
							</div>
						</div>

						<div class="row form-button">
							<div class="form-group">
								<button type="submit" class="btn btn-default btn-primary">INGRESAR</button>
							</div>
						</div>
					</form>

				</div><!-- col -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- form-wrapper -->

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
