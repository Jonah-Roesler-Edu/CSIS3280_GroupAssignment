<?php

// +--------------+-------------+------+-----+---------+----------------+
// | Field        | Type        | Null | Key | Default | Extra          |
// +--------------+-------------+------+-----+---------+----------------+
// | RestaurantId | int(11)     | NO   | PRI | NULL    | auto_increment |
// | Name         | char(50)    | NO   |     | NULL    |                |
// | TimeOpen     | varchar(50) | NO   |     | NULL    |                |
// | TimeClose    | varchar(50) | NO   |     | NULL    |                |
// | DayOpen      | varchar(50) | NO   |     | NULL    |                |
// | DayClose     | varchar(50) | NO   |     | NULL    |                |
// +--------------+-------------+------+-----+---------+----------------+

Class RestaurantMapper {
    //Hold the database connection
    private static $db;

    //Initialize the PDO class with the mapper class
    static function initialize(string $className) {
        self::$db = new PDOAgent($className);
    }

    //Function to retrieve all customers
    static function getRestaurant() {
        $SQLQuery = "SELECT * FROM Restaurant";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }
}


?>