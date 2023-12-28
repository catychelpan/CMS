<?php

session_start();

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH .'src/MainController.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'models/Page.php';

DatabaseConnection::connect('localhost', 'cmsdatabase', 'root' , '8wF(DdCmzG3cY.ez');

//Routing

$section = $_GET['seo_name'] ?? 'home';

$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

$router = new Router($dbc); 
$router->findBy('normal_url', $section);

$action = $router->action != '' ? $router->action : 'default';

$moduleName = ucfirst($router->module) . 'Controller';



if(file_exists(ROOT_PATH . 'controllers/' .$moduleName. '.php')) {

    include ROOT_PATH . 'controllers/' .$moduleName. '.php';

    $controller = new $moduleName();
    $controller->setEntityId($router->entity_id);
    $controller->runAction($action);

}