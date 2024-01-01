<?php

session_start();

use src\DatabaseConnection;
use src\MainController;
use src\Template;

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define ('MODULES_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH .'src/MainController.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once MODULES_PATH . 'page/models/Page.php';


DatabaseConnection::connect('localhost', 'cmsdatabase', 'root' , '8wF(DdCmzG3cY.ez');

//Routing

$section = $_GET['seo_name'] ?? 'home';

$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

$router = new Router($dbc); 
$router->findBy('normal_url', $section);

$action = $router->action != '' ? $router->action : 'default';

$moduleName = ucfirst($router->module) . 'Controller';


$controller_file = MODULES_PATH .''. $router->module .'/controllers/' . $moduleName . '.php';

if(file_exists($controller_file)) {

    include $controller_file;

    $controller = new $moduleName();
    $controller->template = new Template('layout/default');
    $controller->setEntityId($router->entity_id);
    $controller->runAction($action);

}