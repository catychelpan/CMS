<?php

//an active record - makes objects based on the data in database
//ORM in essence
class Router extends Entity{

    public function __construct($dbc) {
        $this->dbc = $dbc;

        $this->table_name = 'routes';

        $this->fields = [
            'id', 
            'module' ,
            'action' ,
            'entity_id' ,
            'normal_url'
        ];


    }


}