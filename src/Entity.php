<?php

namespace src;
abstract class Entity {

    protected $dbc;
    protected $table_name;
    protected $fields;
    protected $primary_keys = ['id'];

    abstract protected function initFields();


    protected function __construct($dbc, $table_name) {

        $this->dbc = $dbc;
        $this->table_name = $table_name;
        $this->initFields();

    }

    public function findBy($field_name, $field_value) {

        $result =  $this->find($field_name, $field_value);

        if ($result && $result[0]) {
            $this-> setValues($result[0]);
        }
    }

    public function findAll() {
        
        $results = [];

        $database_data = $this->find();

        if ($database_data) {

            $class_name = static::class;

            foreach ($database_data as $object_data) {

                $object = new $class_name($this->dbc);
                $object = $this->setValues($object_data, $object);
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

    public function setValues($values, $object = null) {

        if ($object === null) {

            $object = $this;
        }

        foreach ($object->primary_keys as $key_name) { 

            if(isset($values[$key_name])) {

                $object->$key_name = $values[$key_name];

            } 
        } 

        foreach ($object->fields as $field_name) { 

            if(isset($values[$field_name])) {

                $object->$field_name = $values[$field_name];

            } 
        } 

        return $object;

    }

    public function save() {

        $field_bindings = [];
        $keys_bindings = [];
        $prepared_fields = [];

        foreach ($this->primary_keys as $key_name) {
            
            $keys_bindings[$key_name] = $key_name . ' = :' . $key_name;
            $prepared_fields[$key_name] = $this->$key_name;
        }

        foreach ($this->fields as $field_name) {
            
            $field_bindings[$field_name] = $field_name . ' = :' . $field_name;
            $prepared_fields[$field_name] = $this->$field_name;
        }

        
        $field_bindings_str = join(', ', $field_bindings);
        $keys_bindings_str = join(', ', $keys_bindings);

        $sql = "UPDATE " . $this->table_name . " SET " . $field_bindings_str . " WHERE " . $keys_bindings_str;
        
        $statement = $this->dbc->prepare($sql);
        $statement->execute($prepared_fields);
    }


}