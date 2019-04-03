USE restaurantdb;

-- +------------------------+
-- | Tables_in_restaurantdb |
-- +------------------------+
-- | customer               |
-- | diningtable            |
-- | reservation            |
-- | restaurant             |
-- +------------------------+

INSERT INTO Customer VALUES
(1, 'Jonah', 'Roesler', 'JR@Email.com'),
(2, 'Bob', 'Hill', 'BH@Email.com'),
(3, 'Sarah', 'Shmoe', 'SS@Email.com');

INSERT INTO Restaurant VALUES
(1, "Rafaels Diner", "9AM", "9PM", "Monday", "Sunday" ),
(2, "Johnnys Diner", "8AM", "8PM", "Tuesday", "Friday" );

INSERT INTO DiningTable VALUES 
(1, "Patio", "4", 1),
(2, "Patio", "4", 1),
(4, "Inside", "5", 1),
(5, "Inside", "7", 1),
(6, "Inside", "6", 1),
(7, "Inside", "5", 1),
(8, "Booth", "6", 2),
(9, "Booth", "6", 2),
(10, "Inside", "5", 2),
(11, "Inside", "7", 2),
(12, "Inside", "7", 2);

INSERT INTO reservation VALUES
(1, 3, "2019-04-05", "10:00 AM", 1, 3),
(2, 2, "2019-04-07", "12:00 PM", 2, 2),
(3, 5, "2019-04-06", "05:00 PM", 4, 1),
(4, 4, "2019-04-05", "09:00 AM", 8, 3),
(5, 5, "2019-04-06", "11:00 AM", 10, 1);

