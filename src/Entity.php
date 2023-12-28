<?php

abstract class Entity {

    protected $dbc;
    protected $table_name;
    protected $fields;

    abstract protected function initFields();

    protected function __construct($dbc, $table_name) {

        $this->dbc = $dbc;
        $this->table_name = $table_name;
        $this->initFields();

    }

    public function findBy($field_name, $field_value) {

        $sql = "SELECT * FROM " . $this->table_name . " WHERE " . $field_name . " = :value"  ;
        $statement = $this->dbc->prepare($sql);
        $statement->execute(['value' => $field_value]);
        $database_data = $statement->fetch();

        $this->setValues($database_data);


    }

    public function setValues($values) {

        foreach ($this->fields as $field_name) { 
            $this->$field_name = $values[$field_name];

        } 

    }


}