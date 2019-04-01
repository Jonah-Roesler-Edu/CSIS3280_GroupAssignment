<?php


// +------------+-------------+------+-----+---------+----------------+
// | Field      | Type        | Null | Key | Default | Extra          |
// +------------+-------------+------+-----+---------+----------------+
// | CustomerId | int(11)     | NO   | PRI | NULL    | auto_increment |
// | Name       | varchar(50) | NO   |     | NULL    |                |
// | LastName   | varchar(50) | NO   |     | NULL    |                |
// | Email      | varchar(50) | NO   |     | NULL    |                |
// +------------+-------------+------+-----+---------+----------------+


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
        $SQLQuery = "SELECT * FROM Customer WHERE Email "
    }



}


?>