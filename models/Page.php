<?php

class Page {

    //simplified version of active record (ORM pattern)

    public $id;
    public $title;
    public $content;

    private $dbc;

    public function __construct($dbc) {
        $this->dbc = $dbc;
    }

    public function findById($id) {
       
        


        $sql = "SELECT * FROM pages WHERE id = :id";
        $statement = $this->dbc->prepare($sql);
        $statement->execute(['id' => $id]);
        $pageData = $statement->fetch();


        var_dump($pageData);

        $this->id = $pageData['id']; 
        $this->title = $pageData['title'];
        $this->content = $pageData['content']; 





    }

}





?>