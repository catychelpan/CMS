<?php

class ContactController extends MainController {


    function runBeforeAction(){
        if($_SESSION['has_submitted_the_form'] ?? 0==1) {
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $pageObj = new Page($dbc);
            $pageObj->findBy('id', $this->entity_id);

            $variables['pageObj'] = $pageObj;
        
            $template = new Template('default');
            $template->view('static-page', $variables);
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
    
        $template = new Template('default');
        $template->view('contact/contact-us', $variables);
        
    }

    function submitFormAction() {


        $_SESSION['has_submitted_the_form'] = 1;

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entity_id);

        $variables['pageObj'] = $pageObj;
    
        $template = new Template('default');
        $template->view('static-page', $variables);

       
    }

   
}