<?php

class ContactController
{
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

    function runAction($actionName)
    {
        $actionName .= 'Action';
        if (method_exists($this, $actionName)) {
            $this->$actionName();
        } else {
            include 'views/status-pages/error-page.html';
        }
    }
}
