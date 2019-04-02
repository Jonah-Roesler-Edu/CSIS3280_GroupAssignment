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
require_once('inc/Utility/CustomerMapper.class.php');
require_once('inc/Utility/ReservationMapper.class.php');
require_once('inc/Utility/RestaurantMapper.class.php');
require_once('inc/Utility/TableMapper.class.php');
require_once('inc/Utility/Page.class.php');

Page::$title = "Group Project - Restaurant";
Page::header();
Page::dashboard(5);
Page::formRestaurant(); 
Page::footer();

?>