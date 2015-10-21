<?php
/**
 * @description
 * # getConnection
 * Esta función realiza la conexión con la base de datos tomando los datos registrados en el archivo de configuración.
 */
function getConnection(){
	$connection= null;
	try {
		$connection= new PDO("mysql:host=".Config::getDBServer().";dbname=".Config::getDBName().";charset=utf8", Config::getDBUsername(), Config::getDBPassword());
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $connection;
	} catch (PDOException $e) {
		echo "Error: Problemas de conexión con la base de datos.";
	}
}

/**
 * @description
 * # echoResponse
 * Esta función cambia los headers a JSON y se encarga de devolver los datos obtenidos por cada servicio.
 */
function echoResponse($response){
	$app= \Slim\Slim::getInstance();
	$app->contentType('application/json');
	echo json_encode($response);
}

/**
 * @description
 * # getData
 * Esta función ejecuta un MYSQL Query, puede devolver 1 dato (one) o muchos datos (all).
 */
function getData($query, $type){
	try {
		$datos= [];

		$con= getConnection();
		$data= $con->prepare($query);
		$data->execute();

		switch ($type) {
			case 'all':
				$datos= $data->fetchAll();
				break;
			
			case 'one':
				$datos= $data->fetchObject();
				break;

			default:
				$datos= [];
				break;
		}

		$con= null;
		return $datos;
	} catch (PDOException $e) {
		return "Error: Los datos no están disponibles.";
	}
}

/**
 * @description
 * # getData
 * Esta función ejecuta un MYSQL Query, puede devolver 1 dato (one) o muchos datos (all).
 */
function postData($query, $type){
	try {
		$datos= [];

		$con= getConnection();
		$data= $con->prepare($query);
		$data->execute();

		switch ($type) {
			case 'insert':
				$datos= $data->lastInsertId();
				break;
			
			case 'update':
				$datos= $con->countRow();
				break;

			case 'delete':
				$datos= $con->countRow();
				break;

		}

		$con= null;
		return $datos;
	} catch (PDOException $e) {
		return "Error: Los datos no están disponibles.";
	}
}
?>