<?php

use modules\page\models\Page;

class ContactController extends src\MainController {


    function runBeforeAction(){
        if($_SESSION['has_submitted_the_form'] ?? 0==1) {
            $dbh = src\DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $page_obj = new Page($dbc);

            $this->setEntityId(3);
            
            $page_obj->findBy('id', $this->entity_id);

            $variables['page_obj'] = $page_obj;
        
            
            $this->template->view('page/views/static-page', $variables);
            return false;
        }
        return true;
    }

    function defaultAction() {

        
        $dbh = src\DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $page_obj = new Page($dbc);
        $page_obj->findBy('id', $this->entity_id);

        $variables['page_obj'] = $page_obj;
    
        
        $this->template->view('contact/views/contact-us', $variables);
        
    }

    function submitFormAction() {


        $_SESSION['has_submitted_the_form'] = 1;

        $dbh = src\DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $page_obj = new Page($dbc);
        
        $this->setEntityId(4);
        $page_obj->findBy('id', $this->entity_id);

        $variables['page_obj'] = $page_obj;
    
        
        $this->template->view('page/views/static-page', $variables);

       
    }

   
}