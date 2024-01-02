<?php

namespace modules\page\admin\controllers;
use src\MainController;
use modules\page\models\Page;

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

        $page_handler = new Page($this->dbc);
        $pages = $page_handler->findAll();

        $variables['pages'] = $pages;
      
        $this->template->view('page/admin/views/page-list', $variables);
        
    }


    function editPageAction() {

        $page_id = $_GET['id'];

        $variables = [];

        $page = new Page($this->dbc);
        $page->findBy('id', $page_id);

        if($_POST['action'] ?? false) {

            $page->setValues($_POST);
            $page->save();

        }

        $variables['page'] = $page;
      
        $this->template->view('page/admin/views/page-edit', $variables);

    }

}