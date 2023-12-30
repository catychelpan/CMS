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


        if ($database_data) {

            $this->setValues($this, $database_data);

        }

    }

    public function findAll() {

        $results = [];

        $sql = "SELECT * FROM " . $this->table_name;
        $statement = $this->dbc->prepare($sql);
        $statement->execute();
        
        $database_data = $statement->fetchAll();


        if ($database_data) {

            $class_name = static::class;

            foreach ($database_data as $object_data) {

                $object = new $class_name($this->dbc);
                $object = $this->setValues($object, $object_data);
                $results[] = $object;


            }

        }

        return $results;


    }

    public function setValues($object, $values) {

        foreach ($object->fields as $field_name) { 
            $object->$field_name = $values[$field_name];

        } 

        return $object;

    }


}