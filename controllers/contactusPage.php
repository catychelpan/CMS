<?php

class ContactController extends MainController {


    function runBeforeAction(){
        if($_SESSION['has_submitted_the_form'] ?? 0==1) {
            include 'views/contact/contact-us-submitted-before.html';
            return false;
        }
        return true;
    }

    function defaultAction() {

        
        $variables['title'] = 'Contact Us Page';
        $variables['content'] = 'Welcome to our Contact Us Page';
    
        $template = new Template();
        $template->view('contact/contact-us', $variables);
        
    }

    function submitFormAction() {

        //validate
        //store data
        //send email

        $_SESSION['has_submitted_the_form'] = 1;

        include 'views/contact/contact-us-thankyou.html';
    }

   
}