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


Page::$title = "Group Project - Restaurant";
Page::header();
$restaurantArray = RestaurantMapper::getRestaurants();
Page::dashboard($restaurantArray);

if(!empty($_GET)) {
    //RESTAURANT CHOICE IS A PLACEHOLDER FOR WHEN VALUES ARE CREATED
    //Print the form for booking a table
    $tableArray = TableMapper::getRestaurantTables($_GET['restaurant']);
    $restaurant = RestaurantMapper::getOneRestaurant($_GET['restaurant']);
    Page::$subtitle = $restaurant->getName();
    Page::formReservations(null,null, $tableArray);

}

if(!empty($_POST)) {
    switch($_POST['flag']) {
        case 'fReservation':

        if(CustomerMapper::getCustByEmail($_POST['email']) == null) {
            $newCust = new Customer;
            $newCust->setName($_POST['name']);
            $newCust->setLastName($_POST['lastname']);
            $newCust->setEmail($_POST['email']);
    
            CustomerMapper::createCustomer($newCust);
        }

        $getCustomer = CustomerMapper::getCustByEmail($_POST['email']);

        $newRes = new Reservation;
        $newRes->setNumPeople($_POST["numPeople"]);
        $newRes->setDate($_POST["date"]);
        $newRes->setTime($_POST["time"]);
        $newRes->setCustomerId($getCustomer->getCustomerId());
        $newRes->setTableId($_POST['restaurantTables']);
        

        ReservationMapper::createReservation($newRes);
        break;

        case 'fRestaurant':
        break;

        // case 'fTable':
        // break;

        case 'fDeleteReservation':
        break;

    }

}




//WHEN RESTAURANT IS CHOSEN
$tableArray = TableMapper::getRestaurantTables(1);




// Page::$title = "Group Project - Restaurant";
// Page::header();
// Page::dashboard(5);
Page::$subtitle = "New Restaurant";
// Page::formRestaurant(); 
$nrt = new Restaurant();
$nrt->setName("Autostrada");
$nrt->setTimeOpen(mktime(17, 00));
$nrt->setTimeClose(mktime(22, 00));
$nrt->setDayOpen("Mon");
$nrt->setDayClose("Sun");
$nrt->setRestaurantId(1);
Page::$subtitle = "Edit Restaurant";
// Page::formRestaurant($nrt); 


Page::$subtitle = "New Reservation";
// Page::formReservations();
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

//WHEN RESTAURANT IS CHOSEN
// $tableArray = TableMapper::getRestaurantTables(1);
 //var_dump($tableArray);
// Page::formReservations($nr,$nc, $tableArray);
// Page::showReservations(array($nr, $nr2, $tableArray));

// $restaurantArray = RestaurantMapper::getRestaurants();

// Page::dashboard($restaurantArray);
Page::footer();

?>