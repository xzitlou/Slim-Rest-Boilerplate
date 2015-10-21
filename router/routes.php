<?php
$app->get("/", function() use($app){
	require_once("views/home.php");
});

/**
 * @description
 * # Simple GET
 * http://dominio.com/carpeta_del_api/hello_world
 */
$app->get("/hello_world", function() use($app){

	$oResponse= new stdObject();
	$oResponse->data= array("Hello", "World", "!");

	echoResponse($oResponse);

});
/**
 * @description
 * # GET con parametro
 * http://dominio.com/carpeta_del_api/hello_world/lou
 */
$app->get("/hello_world/:nombre", function($nombre) use($app){

	$oResponse= new stdObject();
	$oResponse->data= array("My", "name", "is", $nombre);

	echoResponse($oResponse);

});
/**
 * @description
 * # POST
 * http://dominio.com/carpeta_del_api/hello_world
 * Parámetros: {nombre:<nombre>, apellido:<apellido>}
 */
$app->post("/hello_world", function() use($app){

	$params= $app->request->getBody();
	$params= json_decode($params);

	$nombre= "";
	$apellido= "";

	if(isset($params->nombre)){
		$nombre= $params->nombre;
	}
	if(isset($params->apellido)){
		$apellido= $params->apellido;
	}
	
	$oResponse= new stdObject();
	$oResponse->data->nombre= array("My", "name", "is", $nombre);
	$oResponse->data->apellido= array("My", "lastname", "is", $apellido);

	echoResponse($oResponse);

});
/**
 * @description
 * # PUT
 * http://dominio.com/carpeta_del_api/hello_world/1
 * Parámetros: {nombre:<nombre>, apellido:<apellido>}
 */
$app->put("/hello_world/:id_person", function($id_person) use($app){

	$params= $app->request->getBody();
	$params= json_decode($params);

	$nombre= "";
	$apellido= "";

	if(isset($params->nombre)){
		$nombre= $params->nombre;
	}
	if(isset($params->apellido)){
		$apellido= $params->apellido;
	}
	
	$oResponse= new stdObject();
	$oResponse->id_person= $id_person;
	$oResponse->data->nombre= array("My", "name", "is", $nombre);
	$oResponse->data->apellido= array("My", "lastname", "is", $apellido);

	echoResponse($oResponse);

});
/**
 * @description
 * # DELETE
 * http://dominio.com/carpeta_del_api/hello_world/1
 */
$app->delete("/hello_world/:id_person", function($id_person) use($app){
	
	$oResponse= new stdObject();
	$oResponse->id_person= "Se eliminará a la persona $id_person";

	echoResponse($oResponse);

});
?>