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

    //Function to retrieve all customers
    static function getCustomers() {
        $SQLQuery = "SELECT * FROM Customer";
        self::$db->query($SQLQuery);
        self::$db->execute();
        return self::$db->resultSet();
    }

    static function getACustomer(int $id) {
        $SQLQuery = "SELECT * FROM Customer WHERE CustomerId = :id";
        self::$db->query($SQLQuery);
        self::$db->bind(':id', $id);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to retrieve customer by email
    static function getCustByEmail(string $email) {
        //Create Query
        $SQLQuery = "SELECT * FROM Customer WHERE Email ";
    }

    //function to create a new customer
    static function createCustomer(Customer $newCustomer) : int {
        $SQLCreateCust = "INSERT INTO Customer (Name, LastName, Email) VALUES (:name, :lastname, :email)";

        self::$db->query($SQLCreateCust);

        self::$db->bind(':name', $newCustomer->getName());
        self::$db->bind(':lastname', $newCustomer->getLastName());
        self::$db->bind(':email', $newCustomer->getEmail());

        self::$db->execute();

        return self::$db->lastInsertId();
    }

    //function to delete a customer
    static function deleteCustomer(string $email) {
        $SQLDeleteCust = "DELETE FROM Customer WHERE Email = :email;";

        self::$db->query($SQLDeleteCust);
        self::$db->bind(':email', $email);
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