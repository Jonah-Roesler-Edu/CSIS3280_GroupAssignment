<?php
// Config
require_once('inc/config.inc.php');

// Entities
require_once('inc/Entities/Customer.class.php');
require_once('inc/Entities/Reservation.class.php');
require_once('inc/Entities/Restaurant.class.php');
require_once('inc/Entities/Table.class.php');

// Utilities
require_once('inc/Utility/PDOAgent.class.php');
require_once('inc/Mapper/CustomerMapper.class.php');
require_once('inc/Mapper/ReservationMapper.class.php');
require_once('inc/Mapper/RestaurantMapper.class.php');
require_once('inc/Mapper/TableMapper.class.php');
require_once('inc/Utility/Page.class.php');

CustomerMapper::initialize("Customer");
ReservationMapper::initialize("Reservation");
RestaurantMapper::initialize("Restaurant");
TableMapper::initialize("Table");

if(!empty($_POST)) {
    switch($_POST['flag']) {
        case 'fReservation':
            $newCust = new Customer;
            $newCust->setName($_POST['name']);
            $newCust->setLastName($_POST['lastname']);
            $newCust->setEmail($_POST['email']);

            $customerID = CustomerMapper::createCustomer($newCust);

            $newRes = new Reservation;
            $newRes->setNumPeople($_POST["numPeople"]);
            $newRes->setDate($_POST["date"]);
            $newRes->setTime($_POST["time"]);
            $newRes->setCustomerId($customerID);
            $newRes->setTableId($_POST['restaurantTables']);
            
            ReservationMapper::createReservation($newRes);
            Page::HTMLMessage("The reservation for ".$newCust->getName()." at ".date("Y-M-d",strtotime($newRes->getDate()))." has been created.");
            break;

        case 'editReservation':
            $reservation = ReservationMapper::getAReservation($_POST['reservationId']);
            $dcustomer = CustomerMapper::deleteCustomerId($reservation[0]->getCustomerId());
            $dReservation = ReservationMapper::deleteReservation($reservation[0]->getReservationId());
            
            $newCust = new Customer;
            $newCust->setName($_POST['name']);
            $newCust->setLastName($_POST['lastname']);
            $newCust->setEmail($_POST['email']);

            $customerID = CustomerMapper::createCustomer($newCust);

            $newRes = new Reservation;
            $newRes->setNumPeople($_POST["numPeople"]);
            $newRes->setDate($_POST["date"]);
            $newRes->setTime($_POST["time"]);
            $newRes->setCustomerId($customerID);
            $newRes->setTableId($_POST['restaurantTables']);

            ReservationMapper::createReservation($newRes);
            Page::HTMLMessage("The reservation for ".$newCust->getName()." at ".date("Y-M-d",strtotime($newRes->getDate()))." has been updated.");
            break;
    }

}

Page::$title = "Group Project - Restaurant";
Page::header();
if (count($_GET) == 0) {
    $restaurants = RestaurantMapper::getRestaurant();
    $tableArray = TableMapper::getReservationByRestaurant();
    $data = array();
    for ($i=0; $i < count($restaurants) ; $i++) { 
        $tables = 0;
        for ($j=0; $j < count($tableArray); $j++) {
            if ($restaurants[$i]->getRestaurantId()==$tableArray[$j]->getRestaurantId()) {
                $tables++;
            }
        }
        $data[$restaurants[$i]->getName()] = $tables;
    }

    Page::dashboard($restaurants, $data);
} else{
    if ($_GET["action"] == "forRestaurants") {
        Page::$subtitle = "New Restaurant";
        Page::formRestaurant();
    } else if ($_GET["action"] == "newReservation") {
        //WHEN RESTAURANT IS CHOSEN
        $tableArray = TableMapper::getRestaurantTables($_GET['RestaurantChoice']);
        $restaurant = RestaurantMapper::getOneRestaurant($_GET['RestaurantChoice']);
        Page::$subtitle = "New Reservation - ".$restaurant->getName();
        
        Page::formReservations(null, null, $tableArray);
        $reservations = ReservationMapper::getReservationByRestaurant($restaurant->getRestaurantId());
        Page::showReservations($reservations);
    } else if ($_GET["action"] == "editReservation") {
        //WHEN RESTAURANT IS CHOSEN
        $reservation = ReservationMapper::getAReservation($_GET['reservationId']);
        $customer = CustomerMapper::getACustomer($reservation[0]->getCustomerId());
        $table = TableMapper::getATable($reservation[0]->getTableId());
        $restaurant = RestaurantMapper::getOneRestaurant($table[0]->getRestaurantId());
        $tableArray = TableMapper::getRestaurantTables($table[0]->getRestaurantId());
        Page::$subtitle = "Edit Reservation - ".$restaurant->getName();
        
        Page::formReservations($reservation[0], $customer[0], $tableArray);
    }
    else if ($_GET["action"] == "deleteReservation") {
        $reservation = ReservationMapper::getAReservation($_GET['reservationId']);
        $table = TableMapper::getATable($reservation[0]->getTableId());
        $restaurant = RestaurantMapper::getOneRestaurant($table[0]->getRestaurantId());
        ReservationMapper::deleteReservation($_GET["reservationId"]);
        unset($_GET["action"]);
        unset($_GET["reservationId"]);
        Page::empty();
        Page::HTMLMessage("The reservation in ".$restaurant->getName()." has been deleted");
        header("Refresh: 5; url = RestnReserveGroup.php");
        
    }
    else {
        Page::empty();
    }
}

//WHEN RESTAURANT IS CHOSEN
$tableArray = TableMapper::getRestaurantTables(1);

Page::footer();

?>