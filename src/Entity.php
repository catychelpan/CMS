<?php

namespace src;
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

        $result =  $this->find($field_name, $field_value);

        if ($result && $result[0]) {
            $this-> setValues($this, $result[0]);
        }
    }

    public function findAll() {
        
        $results = [];

        $database_data = $this->find();

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

    private function find($field_name = '', $field_value = '') {

        $results = [];
        $prepared_fields = [];


        $sql = "SELECT * FROM " . $this->table_name;

        if ($field_name) {
            $sql .= " WHERE " . $field_name . " = :value";
            $prepared_fields = ['value' => $field_value];   
        }
        $statement = $this->dbc->prepare($sql);
        $statement->execute($prepared_fields);
        
        $database_data = $statement->fetchAll();


       

        return $database_data;

    }

    public function setValues($object, $values) {

        foreach ($object->fields as $field_name) { 
            $object->$field_name = $values[$field_name];

        } 

        return $object;

    }


}