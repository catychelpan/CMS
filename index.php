<?php

session_start();
require_once 'src/mainController.php';
require_once 'src/template.php';

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);


$section = $_GET['section'] ?? $_POST['action'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'aboutus') {

    include 'controllers/aboutUsPage.php';
    $aboutController = new AboutUsController();
    $aboutController->runAction($action);
} else if ($section == 'contactus') {

    include 'controllers/contactUsPage.php';
    $contactController = new ContactController();
    $contactController->runAction($action);
} else {

    include 'controllers/homePage.php';
    $homeController = new HomePageController();
    $homeController->runAction($action);
}