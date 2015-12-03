<?php
	require 'rb.php';
	R::setup( 'mysql:host=localhost;dbname=pirchiopropiedades', 'root', 'pirchio' );
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login">
    <meta name="author" content="Webing Planners">

    <title>Login - Pirchio Propiedades</title>

</head>

<body>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post" role="form">
	<div>
		<label>Usuario</label>
        <input name="user" type="text" class="form-control" required>
    </div>
    <div>
		<label>Password</label>
		<input name="pass" type="password" class="form-control" required>
    </div>
	<div>
		<button type="submit" class="btn btn-default">Enviar</button>
    </div>
</form>


<?php

	$user = $_POST['user'];
    $pass = $_POST['pass'];
	
	$login = R::findOne('usuarios',' user = ? AND pass = ? ', [$user,$pass]);
	
    if($login != NULL) {
		echo "<script> window.location.assign('http://localhost/entrada.html'); </script>";
    } else {
        print "bad";
    }	
	
	
?>
