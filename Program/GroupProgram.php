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


// if(!empty($_GET)) {
//     //RESTAURANT CHOICE IS A PLACEHOLDER FOR WHEN VALUES ARE CREATED
//     //Print the form for booking a table
//     $tableArray = TableMapper::getRestaurantTables($_GET['RestaurantChoice']);
//     $restaurant = RestaurantMapper::getOneRestaurant($_GET['RestaurantChoice']);
//     Page::$subtitle = $restaurant->getName();
//     Page::formReservations(null,null, $tableArray);

// }

if(!empty($_POST)) {
    switch($_POST['flag']) {
        case 'fReservation':
        $newCust = new Customer;
        $newCust->setName($_POST['name']);
        $newCust->setLastName($_POST['lastname']);
        $newCust->setEmail($_POST['email']);

        $customerID = CustomerMapper::createCustomer($newCust);

        //$getCustomer = CustomerMapper::getCustByEmail($_POST['email']);

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
            $dTable = TableMapper::deleteTable($reservation[0]->getTableId());
            $dReservation = ReservationMapper::deleteReservation($reservation[0]->getReservationId());
            
            $newCust = new Customer;
            $newCust->setName($_POST['name']);
            $newCust->setLastName($_POST['lastname']);
            $newCust->setEmail($_POST['email']);

            $customerID = CustomerMapper::createCustomer($newCust);

            //$getCustomer = CustomerMapper::getCustByEmail($_POST['email']);

            $newRes = new Reservation;
            $newRes->setNumPeople($_POST["numPeople"]);
            $newRes->setDate($_POST["date"]);
            $newRes->setTime($_POST["time"]);
            $newRes->setCustomerId($customerID);
            $newRes->setTableId($_POST['restaurantTables']);
            

            ReservationMapper::createReservation($newRes);
            Page::HTMLMessage("The customer ".$newCust->getName()." has been updated");
        break;

        // case 'fTable':
        // break;

    }

}

Page::$title = "Group Project - Restaurant";
Page::header();
if (count($_GET) == 0) {
     $restaurants = RestaurantMapper::getRestaurant();
    $tableArray = TableMapper::getDiningTables();
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
        
        //var_dump($tableArray);
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
        
        //var_dump($tableArray);
        Page::formReservations($reservation[0], $customer[0], $tableArray);
    }
    else if ($_GET["action"] == "deleteReservation") {
        ReservationMapper::deleteReservation($_GET["reservationId"]);
        unset($_GET["action"]);
        unset($_GET["reservationId"]);
        var_dump($_GET);

        header("location:GroupProgram.php");
    }
    else {

        $nrt = new Restaurant();
        $nrt->setName("Autostrada");
        $nrt->setTimeOpen(mktime(17, 00));
        $nrt->setTimeClose(mktime(22, 00));
        $nrt->setDayOpen("Mon");
        $nrt->setDayClose("Sun");
        $nrt->setRestaurantId(1);
        Page::$subtitle = "Edit Restaurant";
        Page::formRestaurant($nrt);
        $nr = new Reservation();
        $nr->setReservationId(1);
        $nr->setCustomerId(1);
        $nr->setNumPeople(3);
        $nr->setDate("2019-05-05");
        $nr->setTime(mktime(16, 20));
        $nr2 = new Reservation();
        $nr2->setReservationId(1);
        $nr2->setCustomerId(1);
        $nr2->setNumPeople(3);
        $nr2->setDate("2019-05-05");
        $nr2->setTime(mktime(16, 20));
        $nc = new Customer();
        $nc->setCustomerId(1);
        $nc->setName("Rafael");
        $nc->setLastName("Olivares");
        $nc->setEmail("rafa@douglas.com");
        Page::$subtitle = "Edit Reservation";
        Page::formReservations($nr,$nc);
        Page::showReservations(array($nr, $nr2));
    }
}


//WHEN RESTAURANT IS CHOSEN
$tableArray = TableMapper::getRestaurantTables(1);




// Page::$title = "Group Project - Restaurant";
// Page::header();
// // Page::dashboard(5);
// Page::$subtitle = "New Restaurant";
// // Page::formRestaurant(); 
// $nrt = new Restaurant();
// $nrt->setName("Autostrada");
// $nrt->setTimeOpen(mktime(17, 00));
// $nrt->setTimeClose(mktime(22, 00));
// $nrt->setDayOpen("Mon");
// $nrt->setDayClose("Sun");
// $nrt->setRestaurantId(1);
// Page::$subtitle = "Edit Restaurant";
// // Page::formRestaurant($nrt); 


// Page::$subtitle = "New Reservation";
// // Page::formReservations();
// $nr = new Reservation();
// $nr->setReservationId(1);
// $nr->setCustomerId(1);
// $nr->setNumPeople(3);
// $nr->setDate("2019-05-05");
// $nr->setTime(mktime(16, 20));
// $nr2 = new Reservation();
// $nr2->setReservationId(1);
// $nr2->setCustomerId(1);
// $nr2->setNumPeople(3);
// $nr2->setDate("2019-05-05");
// $nr2->setTime(mktime(16, 20));
// $nc = new Customer();
// $nc->setCustomerId(1);
// $nc->setName("Rafael");
// $nc->setLastName("Olivares");
// $nc->setEmail("rafa@douglas.com");
// Page::$subtitle = "Edit Reservation";


Page::footer();

?>