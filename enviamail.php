<?php
// Comprobamos que no haya nada vacío
if(empty($_POST['nombre'])  		||
   empty($_POST['email']) 		||
   empty($_POST['telefono']) 		||
   empty($_POST['mensaje'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "&iquest;Faltan argumentos!";
	return false;
   }

$nombre = $_POST['nombre'];
$direccion_mail = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Crear el email y mandar el mensaje
$para = 'yo@pirchiopropiedades.com';
$asunto = "Mensaje de:  $nombre - Pirchio Propiedades WEB";
$cuerpo = "Tienes un nuevo mensaje a través del formulario de contacto.\n\n"."Nombre: $nombre\n\nEmail: $email_address\n\nTelefono: $telefono\n\nMensaje:\n$mensaje";
$cabeceras = "From: noreply@pirchiopropiedades.com\n";
$cabeceras .= "Reply-To: $direccion_mail";
mail($para,$asunto,$cuerpo,$cabeceras);
return true;
?>
