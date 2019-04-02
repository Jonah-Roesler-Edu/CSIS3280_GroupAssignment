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

        //function to create a new Table
        static function createTable(Table $newTable) {
            $SQLCreateTable = "INSERT INTO DiningTable (Placement, SeatingNum, RestaurantID)
            VALUES (:placement, :seatingnum, :restaurantid)";
    
            self::$db->query($SQLCreateTable);
    
            self::$db->bind(':placement', $newTable->getPlacement());
            self::$db->bind(':seatingnum', $newTable->getSeatingNum());
            self::$db->bind(':restaurantid', $newTable->getRestaurantId());
    
            self::$db->execute();
    
            return self::$db->lastInsertedid();
        }
    
        //function to delete a customer
        static function deleteTable(int $tableID) {
            $SQLDeleteCust = "DELETE FROM DiningTable WHERE TableId = :tableid;";
    
            self::$db->query($SQLDeleteCust);
            self::$db->bind(':tableid', $tableID);
            self::$db->execute();
    
            
            // if(self::$db->rowCount() !=1) {
            //     throw new Exception("Unable to delete customer at $email");
            // }
    
            // try {
    
            // }
            // catch (Exception $e) {
            //     echo $e->getMessage();
            //     self::$db->debugDumpParams();
            // }
        }
}


?>