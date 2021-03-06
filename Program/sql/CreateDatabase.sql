
DROP DATABASE IF EXISTS restaurantdb;
CREATE DATABASE restaurantdb;
use restaurantdb;

/*Clean up just in case*/
-- DROP TABLE IF EXISTS Restaurant;
-- DROP TABLE IF EXISTS [Table];
-- DROP TABLE IF EXISTS ;
-- DROP TABLE IF EXISTS ;

CREATE TABLE Restaurant ( 
    RestaurantId INT AUTO_INCREMENT NOT NULL,
    Name CHAR(50) NOT NULL,
    TimeOpen VARCHAR(50) NOT NULL,
    TimeClose VARCHAR(50) NOT NULL,
    DayOpen VARCHAR(50) NOT NULL,
    DayClose VARCHAR(50) NOT NULL,
    PRIMARY KEY (RestaurantId)
);

CREATE TABLE DiningTable (
    TableId INT AUTO_INCREMENT NOT NULL,
    Placement VARCHAR(50) NOT NULL,
    SeatingNum VARCHAR(50) NOT NULL,
    RestaurantId INT(10),
    PRIMARY KEY (TableId),
    FOREIGN KEY (RestaurantId) REFERENCES Restaurant (RestaurantId)
);

CREATE TABLE Customer (
    CustomerId INT AUTO_INCREMENT NOT NULL,
    Name VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    PRIMARY KEY (CustomerId)
);

CREATE TABLE Reservation (
    ReservationId INT AUTO_INCREMENT NOT NULL,
    NumPeople INT(10) NOT NULL,
    DATE VARCHAR(50) NOT NULL,
    Time VARCHAR(50) NOT NULL,
    TableId INT(10) NOT NULL,
    CustomerId INT(10) NOT NULL,
    PRIMARY KEY (ReservationId),
    FOREIGN KEY (TableId) REFERENCES DiningTable (TableId),
    FOREIGN KEY (CustomerId) REFERENCES Customer (CustomerId)
);