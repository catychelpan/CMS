<?php

class PageController extends MainController{

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

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $page_handler = new Page($dbc);
        $pages = $page_handler->findAll();
      
        $this->template->view('page/admin/views/page-list', $variables);
        
    }

}