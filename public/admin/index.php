<?php

session_start();

use src\DatabaseConnection;
use src\Template;

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR .'..\..'. DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH  . 'views' . DIRECTORY_SEPARATOR);
define ('MODULES_PATH', ROOT_PATH  . 'modules' . DIRECTORY_SEPARATOR);
define ('ENCRYPTION_SALT', 'gcftsdfhi8oe47e8s');



spl_autoload_register(function ($class_name) {
    
    $file = ROOT_PATH . str_replace('\\', '/', $class_name) . '.php';

   if (file_exists($file)) {
       require $file;
   }

});






DatabaseConnection::connect('localhost', 'cmsdatabase', 'root' , '8wF(DdCmzG3cY.ez');


$module = $_GET['module'] ?? $_POST['module'] ?? 'dashboard';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();


if ($module=='dashboard') {
    
    include MODULES_PATH . 'dashboard/admin/controllers/DashboardController.php';
    
    $dashController = new DashboardController();
    $dashController->template = new Template('admin/layout/default');
    $dashController->runAction($action);
    
} elseif ($module == 'page') {

    include MODULES_PATH . 'page/admin/controllers/PageController.php';
    
    $pageController = new \modules\page\admin\controllers\PageController();
    $pageController->dbc = $dbc;    
    $pageController->template = new Template('admin/layout/default');
    $pageController->runAction($action);

}