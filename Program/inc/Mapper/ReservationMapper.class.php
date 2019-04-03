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

    //Function to retrieve all Reservation
    static function getReservations() {
        $SQLQuery = "SELECT * FROM Reservation";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }

        //function to create a new Reservation
        static function createReservation(Reservation $newReservation) {

            //FIRST WE NEED TO GET THE TABLE ID OF A TABLE
            

            $SQLCreateReserve = "INSERT INTO Reservation (NumPeople, DATE, Time, TableID, CustomerId)
            VALUES (:numpeople, :date, :time, :tableid, :customerid)";
    
            self::$db->query($SQLCreateReserve);
    
            self::$db->bind(':numpeople', $newReservation->getNumPeople());
            self::$db->bind(':date', $newReservation->getDate());
            self::$db->bind(':time', $newReservation->getTime());
            self::$db->bind(':tableid', $newReservation->getTableId());
            self::$db->bind(':customerid', $newReservation->getCustomerId());
    
            self::$db->execute();
    
            return self::$db->lastInsertedid();
        }
    
        //function to delete a reservation
        static function deleteReservation(int $resrvationID) {
            $SQLDeleteReserve = "DELETE FROM reservation WHERE ReservationId = :reservationid;";
    
            self::$db->query($SQLDeleteReserve);
            self::$db->bind(':reservationid', $resrvationID);
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