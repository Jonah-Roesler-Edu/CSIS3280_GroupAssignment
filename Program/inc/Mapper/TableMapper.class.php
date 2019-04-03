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

    //Function to retrieve all Tables
    static function getDiningTables() {
        $SQLQuery = "SELECT * FROM DiningTable";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }

    static function getReservationByRestaurant() : Array{
        $SQLQuery = "SELECT diningtable.TableId, diningtable.Placement, diningtable.SeatingNum, diningtable.RestaurantId FROM reservation INNER JOIN diningtable ON reservation.TableId = diningtable.TableId inner join restaurant on restaurant.RestaurantId = diningtable.RestaurantId";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //function to get tables based on restaurant number
    static function getRestaurantTables(int $RestaurantID) {
        $SQLFindTables = "SELECT * FROM DiningTable WHERE RestaurantId = :restaurantid";

        self::$db->query($SQLFindTables);
        self::$db->bind(':restaurantid', $RestaurantID);
        self::$db->execute();

        return self::$db->resultset();
    }

    static function getATable(int $id) {
        $SQLFindTables = "SELECT * FROM DiningTable WHERE TableId = :id";

        self::$db->query($SQLFindTables);
        self::$db->bind(':id', $id);
        self::$db->execute();

        return self::$db->resultset();
    }

    // }

        //function to create a new diningTable
        static function createTable(Table $newTable) {
            $SQLCreateTable = "INSERT INTO DiningTable (Placement, SeatingNum, RestaurantID)
            VALUES (:placement, :seatingnum, :restaurantid)";
    
            self::$db->query($SQLCreateTable);
    
            self::$db->bind(':placement', $newTable->getPlacement());
            self::$db->bind(':seatingnum', $newTable->getSeatingNum());
            self::$db->bind(':restaurantid', $newTable->getRestaurantId());
    
            self::$db->execute();
    
            return self::$db->lastInsertId();
        }
    
        //function to delete a diningtable
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