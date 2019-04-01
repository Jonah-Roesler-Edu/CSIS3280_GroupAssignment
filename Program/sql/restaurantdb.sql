CREATE TABLE Restaurant ( 
    RestaurantId INT AUTO_INCREMENT NOT NULL,
    Name CHAR(50) NOT NULL,
    TimeOpen VARCHAR(50) NOT NULL,
    TimeClose VARCHAR(50) NOT NULL,
    DayOpen VARCHAR(50) NOT NULL,
    DayClose VARCHAR(50) NOT NULL,
    PRIMARY KEY (RestaurantId)
);