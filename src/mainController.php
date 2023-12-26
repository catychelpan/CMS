<?php

class MainController {

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