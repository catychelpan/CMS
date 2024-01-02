<?php

use src\Entity;

//an active record - makes objects based on the data in database
//ORM in essence
class Router extends Entity{

    public function __construct($dbc) {
        
        parent::__construct($dbc, 'routes');
    }

    protected function initFields() {

        $this->fields = [
            'id', 
            'module' ,
            'action' ,
            'entity_id' ,
            'normal_url'
        ];

    }



}