<?php
/**
 * @description
 * Quitar los comentarios para hacer debug.
 */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

/**
 * @description
 * Quitar los comentarios si el API estará en un directorio
 * $directory= "/directorio/"
 * Comentar si estará en la raíz
 */
$directory= "/";

/**
 * @description
 * Configuración inicial para poder utilizar Slim Framework.
 */
$main_path= $_SERVER['DOCUMENT_ROOT'].$directory;
ini_set('default_charset', 'urf-8');
require_once($main_path.'libs/Slim/Slim.php');

\Slim\Slim::registerAutoloader();
$app= new \Slim\Slim();
$app->contentType('text/html; charset=utf-8');

/**
 * @description
 * Se llamara al Config file, functions y routes.
 */
require_once($main_path.'config.php');
require_once($main_path.'libs/functions.php');

/**
 * @description
 * Cargar los models.
 */
require_once($main_path.'model/stdclass.php');
require_once($main_path.'model/category.php');
require_once($main_path.'model/post.php');

/**
 * @description
 * Cargar las rutas.
 */
require_once($main_path.'router/routes.php');

/**
 * @description
 * Slim empieza a escuchar peticiones.
 */
$app->run();
?>