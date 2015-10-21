<?php
/**
 * @description
 * # Config
 * Se establece los datos para poder conectar con la base de datos.
 */
abstract class Config{
	static private $db_username= "";
	static private $db_password= "";
	static private $db_name= "";
	static private $db_server= "localhost";

	public function getDBUsername(){
		return self::$db_username;
	}
	public function getDBPassword(){
		return self::$db_password;
	}
	public function getDBServer(){
		return self::$db_server;
	}
	public function getDBName(){
		return self::$db_name;
	}
}
?>