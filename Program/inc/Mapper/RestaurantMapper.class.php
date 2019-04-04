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
    static function getRestaurant() : Array{
        $SQLQuery = "SELECT * FROM Restaurant";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Get Certain restaurant
    static function getOneRestaurant($restaurantID) {
        $SQLGetRestaurant = "SELECT * FROM Restaurant WHERE RestaurantId = :restaurant";
        self::$db->query($SQLGetRestaurant);
        self::$db->bind(':restaurant', $restaurantID);
        self::$db->execute();
        return self::$db->singleResult();
    }

    //function to create a new Restaurant
    static function createRestaurant(Restaurant $newRestaurant) {
        $SQLCreateRestaurant = "INSERT INTO Restaurant (Name, TimeOpen, TimeClose, DayOpen, DayClose)
        VALUES (:name, :timeopen, :timeclose, :dayopen, :dayclose)";

        self::$db->query($SQLCreateRestaurant);

        self::$db->bind(':name', $newRestaurant->getName());


        self::$db->execute();

        return self::$db->lastInsertId();
    }
    
    //function to delete a Restaurant
    static function deleteRestaurant(int $restaurantID) {
        $SQLDeleteRestaurant = "DELETE FROM Restaurant WHERE RestaurantId = :restaurantid;";

        self::$db->query($SQLDeleteRestaurant);
        self::$db->bind(':restaurantid', $restaurantID);
        self::$db->execute();
    }
}


?>