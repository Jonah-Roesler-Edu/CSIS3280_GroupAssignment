<?php

Class CustomerMapper {

    //Hold the database connection
    private static $db;

    //Initialize the PDO class with the mapper class
    static function initialize(string $className) {
        self::$db = new PDOAgent($className);
    }

    //Function to retrieve customer by email
    static function getCustByEmail(string $email) {
        //Create Query
        $SQLQuery = "SELECT * FROM CUSTOMER"
    }



}


?>