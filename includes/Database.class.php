<?php

/**Clase Database encargada de la conexion con la base de datos
 * Version 1.0
 * Autor Ale
 */
	class Database{

		// Atributos ---------------------------
		private static $instancia;
		private $config;
		private $dbname;
		private $user;
		private $pass;
		private $isFrozen;
		
		// Métodos -----------------------------
		private function __construct() {  
		
			$this->config= parse_ini_file('dbpirchiopropiedades.conf.ini');
			$this->dbname = "mysql:host=localhost;dbname=".$this->config['dbname'];
			$this->user = $this->config['username'];
			$this->pass = $this->config['password'];
			$this->isFrozen = $this->config['frozen'];
		}

		//Metodo que sirve para obtener una instancia de la clase
		public static function getInstance() {
			
			if(!self::$instancia instanceof self) {
				self::$instancia = new self;
			}
			return self::$instancia;
		}


		//Metodo que sirve para conectar con la base de datos
		public function connect() {
			
			R::setup( $this->dbname, $this->user, $this->pass, $this->isFrozen );
		}

		/*Metodo que sirve para verificar la conexion con la base de datos
		  retorna un valor boolean
		*/
		public function isConnect() {
			
			return R::testConnection();
		}

		//Metodo que sirve para desconectarse de la base de datos
		public function disconnect() {
			
			R::close();
		}
	}

?>
