<?php

use PizzaApp\Core\Authorization;
use PizzaApp\Data\PostcodeDAO;

session_start();
require_once 'vendor/autoload.php';

Authorization::clientUnregister();
$userdata = $_SESSION['client'];

// var_dump($userdata);

$userPostcode = new PostcodeDAO();
$userLocation = $userPostcode->getPostcodeByID($userdata['postcode_id']);

// $card = $_SESSION['order'];

include 'src/Views/checkout.php';
