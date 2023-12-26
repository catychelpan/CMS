<?php

session_start();

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH .'src/mainController.php';
require_once ROOT_PATH . 'src/template.php';




$section = $_GET['section'] ?? $_POST['action'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'aboutus') {

    include ROOT_PATH . 'controllers/aboutUsPage.php';
    $aboutController = new AboutUsController();
    $aboutController->runAction($action);
} else if ($section == 'contactus') {

    include ROOT_PATH . 'controllers/contactUsPage.php';
    $contactController = new ContactController();
    $contactController->runAction($action);
} else {

    include ROOT_PATH . 'controllers/homePage.php';
    $homeController = new HomePageController();
    $homeController->runAction($action);
}