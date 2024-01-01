<?php

namespace src;
class MainController {

    protected $entity_id;
    public $template;
    public $dbc;



    function runAction($action_name)
    {
        
        if(method_exists($this,'runBeforeAction')) {
            $result = $this->runBeforeAction();
            if(!$result) {
                return;
            }
        }

        $action_name .= 'Action';
        if(method_exists($this, $action_name)) {
            $this->$action_name();
        } else {
            include 'views/status-pages/error-page.html';
        }
    }

    function setEntityId($entity_id) {

        $this->entity_id = $entity_id;

    }

}