<?php

class MainController {


    function runAction($actionName)
    {
        
        if(method_exists($this,'runBeforeAction')) {
            $result = $this->runBeforeAction();
            if(!$result) {
                return;
            }
        }

        $actionName .= 'Action';
        if(method_exists($this, $actionName)) {
            $this->$actionName();
        } else {
            include 'views/status-pages/error-page.html';
        }
    }

}