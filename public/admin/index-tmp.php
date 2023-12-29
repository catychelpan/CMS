<?php

session_start();

define ('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR .'..\..'. DIRECTORY_SEPARATOR);
define ('VIEW_PATH', ROOT_PATH  . 'views' . DIRECTORY_SEPARATOR);
define ('MODULES_PATH', ROOT_PATH  . 'modules' . DIRECTORY_SEPARATOR);
define ('ENCRYPTION_SALT', 'gcftsdfhi8oe47e8s');

require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Auth.php';
require_once MODULES_PATH . 'user/models/User.php';

DatabaseConnection::connect('localhost', 'cmsdatabase', 'root' , '8wF(DdCmzG3cY.ez');


$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

$user_obj = new User($dbc);

$user_obj->findBy('username', 'admin');

$auth_obj = new Auth();
$user_obj = $auth_obj->changeUserPassword($user_obj,'TopSecret');

var_dump($user_obj);