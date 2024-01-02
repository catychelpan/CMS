<?php

namespace src;
use modules\user\models\User;
class Auth  {

    function checkLogin($username, $password) {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $user_obj = new User($dbc);
        $user_obj->findBy('username', $username);

        if (property_exists($user_obj, 'id')) {

            if (password_verify($password, $user_obj->password)) {

                return true;


            } 
        }

    }

    function changeUserPassword($user_obj, $new_password) {


        $user_obj->password = password_hash($new_password, PASSWORD_DEFAULT);
       
        return $user_obj;

    }



}