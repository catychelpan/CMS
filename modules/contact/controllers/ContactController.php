<?php

class ContactController extends MainController {


    function runBeforeAction(){
        if($_SESSION['has_submitted_the_form'] ?? 0==1) {
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $pageObj = new Page($dbc);
            $pageObj->findBy('id', $this->entity_id);

            $variables['pageObj'] = $pageObj;
        
            
            $this->template->view('page/views/static-page', $variables);
            return false;
        }
        return true;
    }

    function defaultAction() {

        
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entity_id);

        $variables['pageObj'] = $pageObj;
    
        
        $this->template->view('contact/views/contact-us', $variables);
        
    }

    function submitFormAction() {


        $_SESSION['has_submitted_the_form'] = 1;

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entity_id);

        $variables['pageObj'] = $pageObj;
    
        
        $this->template->view('page/views/static-page', $variables);

       
    }

   
}