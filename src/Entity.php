<?php

class Entity {

    protected $dbc;
    protected $table_name;
    protected $fields;

    public function findBy($field_name, $field_value) {

        $sql = "SELECT * FROM " . $this->table_name . " WHERE " . $field_name . " = :value"  ;
        $statement = $this->dbc->prepare($sql);
        $statement->execute(['value' => $field_value]);
        $databaseData = $statement->fetch();

        $this->setValues($databaseData);


    }

    public function setValues($values) {

        foreach ($this->fields as $field_name) { 
            $this->$field_name = $values[$field_name];

        } 

    }


}