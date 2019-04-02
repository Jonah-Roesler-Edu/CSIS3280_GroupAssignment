<?php

// +--------------+-------------+------+-----+---------+----------------+
// | Field        | Type        | Null | Key | Default | Extra          |
// +--------------+-------------+------+-----+---------+----------------+
// | TableId      | int(11)     | NO   | PRI | NULL    | auto_increment |
// | Placement    | varchar(50) | NO   |     | NULL    |                |
// | SeatingNum   | varchar(50) | NO   |     | NULL    |                |
// | RestaurantId | int(10)     | YES  | MUL | NULL    |                |
// +--------------+-------------+------+-----+---------+----------------+

Class TableMapper {
    //Hold the database connection
    private static $db;

    //Initialize the PDO class with the mapper class
    static function initialize(string $className) {
        self::$db = new PDOAgent($className);
    }

    //Function to retrieve all customers
    static function getDiningTables() {
        $SQLQuery = "SELECT * FROM DiningTable";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }
}


?>