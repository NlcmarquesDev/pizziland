<?php
session_start();

use PizzaApp\Core\Authorization;
use PizzaApp\Data\PostcodeDAO;

require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';
$checkoutForm = checkform();

Authorization::clientUnregister();
$userdata = $_SESSION['client'];

$userPostcode = new PostcodeDAO();
$userLocation = $userPostcode->getPostcodeByID($userdata['postcode_id']);



include 'src/Views/checkout.php';
