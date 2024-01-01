<?php

namespace src;

final class DatabaseConnection {

    private static $instance = null;
    private static $connection;


    public static function getInstance() {

        if (is_null(self::$instance)) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }


    //to make sure that our database is singeltone -> override the constructor 
    //to make it private (nobody can actually construct any objects out of this class)

    private function __construct() {}

    private function __clone() {}

   


    public static function connect($host, $dbName, $user, $password) {

        self::$connection = new \PDO("mysql:host=$host;port=5040;dbname=$dbName", $user, $password);
    }

    public static function getConnection() {

        return self::$connection;

    }


    
}