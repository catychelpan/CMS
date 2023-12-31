<?php

use src\Auth;
class DashboardController extends src\MainController {


    function runBeforeAction() {
        if ($_SESSION['is_admin']  ?? false == true){

            return true; 

        }  

        $action = $_GET['action'] ?? $_POST['action'] && 'default';

        if ($action != 'login') {

            header('Location: /CMS/public/admin/index.php?module=dashboard&action=login');

        }else {

            return true;
        }
        
        
    
    }

    function defaultAction() {

        $variables = [];
      
        header('Location: /CMS/public/admin/index.php?module=page');


        exit();
        
    }


    function loginAction() {

        

        if ($_POST['postAction'] ?? 0 == 1) {

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';


            $auth = new Auth();

            if ($auth->checkLogin($username, $password)) {
                
                $_SESSION['is_admin'] = 1;
                header('Location: /CMS/public/admin/');
                
                exit();
            } else {
                $_SESSION['validation']['error'] = "Username or password isn't correct.";
            }

            
        }


        include VIEW_PATH . 'login.php';

        unset($_SESSION['validation']['error']);

        
    }

}