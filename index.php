<?php


$section = $_GET['section'] ?? $_POST['action'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'aboutus') {

    include 'controllers/aboutUsPage.php';
} else if ($section == 'contactus') {

    include 'controllers/contactusPage.php';
    $contactController = new ContactController();
    $contactController->runAction($action);
} else {

    include 'controllers/homePage.php';
}
