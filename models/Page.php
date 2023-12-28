<?php

class Page extends Entity{

    //simplified version of active record (ORM pattern)

    public function __construct($dbc) {
        $this->dbc = $dbc;

        $this->table_name = 'pages';

        $this->fields = [
            'id', 
            'title' ,
            'content' 
        ];

    }

    

}





?>