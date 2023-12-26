<?php

class ContactController extends MainController {


    function runBeforeAction(){
        if($_SESSION['has_submitted_the_form'] ?? 0==1) {
            $variables['title'] = 'You have already submitted the form.';
            $variables['content'] = 'Please, be patient as we process your message.';
        
            $template = new Template('default');
            $template->view('static-page', $variables);
            return false;
        }
        return true;
    }

    function defaultAction() {

        
        $variables['title'] = 'Contact Us Page';
        $variables['content'] = 'Welcome to our Contact Us Page';
    
        $template = new Template('default');
        $template->view('contact/contact-us', $variables);
        
    }

    function submitFormAction() {

        //validate
        //store data
        //send email

        $_SESSION['has_submitted_the_form'] = 1;

        $variables['title'] = 'Thank you for contacting us.';
        $variables['content'] = 'We will get back to you soon.';
    
        $template = new Template('default');
        $template->view('static-page', $variables);

       
    }

   
}