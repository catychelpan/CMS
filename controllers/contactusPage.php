<?php

class ContactController extends MainController {
    function defaultAction()
    {
        include 'views/contact-us.html';
    }

    function submitFormAction()
    {
        //validate
        //store data
        //send email

        include 'views/contact-us-thankyou.html';
    }

   
}