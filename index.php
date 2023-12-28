<?php

session_start();

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH .'src/MainController.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'models/Page.php';

DatabaseConnection::connect('localhost', 'cmsdatabase', 'root' , '8wF(DdCmzG3cY.ez');




$section = $_GET['section'] ?? $_POST['action'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'aboutus') {

    include ROOT_PATH . 'controllers/AboutUsPageController.php';
    $aboutController = new AboutUsPageController();
    $aboutController->runAction($action);
} else if ($section == 'contactus') {

    include ROOT_PATH . 'controllers/ContactUsPageController.php';
    $contactController = new ContactController();
    $contactController->runAction($action);
} else {

    include ROOT_PATH . 'controllers/HomePageController.php';
    $homeController = new HomePageController();
    $homeController->runAction($action);
}