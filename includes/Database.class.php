<?php
	spl_autoload_register(function ($class) {
        include_once('includes/' . $class . '.class.php');
    });
	
	class Database{	

		// Atributos ---------------------------
		
		// Métodos -----------------------------
		function connect(){	
			// Abro los datos de conexion y lo convierto en array para su utilizacion
			$config = parse_ini_file('dbpirchiopropiedades.conf.ini');
			$dbname = "mysql:host=localhost;dbname=".$config['dbname'];
			$user = $config['username'];
			$pass = $config['password'];		
			
			R::setup( $dbname, $user, $pass );		
			
			// Si la conexion no se logro, capturo el error
			if(!R::testConnection()) {
				echo "No se ah podido conectar con la base de datos";
			}
		}
		
		function disconnect(){
			R::close();
		}
	}
	
	
	
?>