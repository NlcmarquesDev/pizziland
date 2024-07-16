<?php

use PizzaApp\Data\DeliveryDAO;

session_start();
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';







// $deliverys = new DeliveryDAO();
// $delivery = $deliverys->getDeliveryByUserID($_SESSION['client']['user_id']);



include 'src/Views/delivery.php';
