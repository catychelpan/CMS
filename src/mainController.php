<?php

class MainController {

    protected $entity_id;

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

    function setEntityId($entity_id) {

        $this->entity_id = $entity_id;

    }

}