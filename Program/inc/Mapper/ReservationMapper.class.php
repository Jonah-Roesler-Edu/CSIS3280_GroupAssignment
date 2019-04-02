<?php

// +---------------+-------------+------+-----+---------+----------------+
// | Field         | Type        | Null | Key | Default | Extra          |
// +---------------+-------------+------+-----+---------+----------------+
// | ReservationId | int(11)     | NO   | PRI | NULL    | auto_increment |
// | NumPeople     | int(10)     | NO   |     | NULL    |                |
// | DATE          | varchar(50) | NO   |     | NULL    |                |
// | Time          | varchar(50) | NO   |     | NULL    |                |
// | TableId       | int(10)     | NO   | MUL | NULL    |                |
// | CustomerId    | int(10)     | NO   | MUL | NULL    |                |
// +---------------+-------------+------+-----+---------+----------------+

Class ReservationMapper {
    //Hold the database connection
    private static $db;

    //Initialize the PDO class with the mapper class
    static function initialize(string $className) {
        self::$db = new PDOAgent($className);
    }

    //Function to retrieve all customers
    static function getReservations() {
        $SQLQuery = "SELECT * FROM Reservation";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }
}


?>