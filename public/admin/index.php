<?php

session_start();

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR .'..\..'. DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH  . 'views' . DIRECTORY_SEPARATOR);
define ('MODULES_PATH', ROOT_PATH  . 'modules' . DIRECTORY_SEPARATOR);
define ('ENCRYPTION_SALT', 'gcftsdfhi8oe47e8s');

require_once ROOT_PATH . 'src/Auth.php';
require_once MODULES_PATH . 'user/models/User.php';
require_once ROOT_PATH .'src/MainController.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once MODULES_PATH . 'page/models/Page.php';

DatabaseConnection::connect('localhost', 'cmsdatabase', 'root' , '8wF(DdCmzG3cY.ez');


$module = $_GET['module'] ?? $_POST['module'] ?? 'dashboard';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';



if ($module=='dashboard') {
    
    include MODULES_PATH . 'dashboard/admin/controllers/DashboardController.php';
    
    $dashController = new DashboardController();
    $dashController->runAction($action);
    
} 