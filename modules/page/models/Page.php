<?php

namespace modules\page\models;


class Page extends \src\Entity {

    //simplified version of active record (ORM pattern)

    public function __construct($dbc) {

        parent::__construct($dbc, 'pages');
        
    }

    protected function initFields() {

        $this->fields = [
            'id', 
            'title' ,
            'content' 
        ];

    }

}

?>