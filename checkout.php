<?php
session_start();

use PizzaApp\Data\OrdersDAO;
use PizzaApp\Data\PostcodeDAO;
use PizzaApp\Core\Authorization;

require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';
$checkoutForm = checkform();

Authorization::clientUnregister();
$userdata = $_SESSION['client'];

$userPostcode = new PostcodeDAO();
$userLocation = $userPostcode->getPostcodeByID($userdata['postcode_id']);

$order = new OrdersDAO();

$promoSection = false;

if (isset($userdata['user_id'])) {
    if (!$order->getOrdersByUserID($userdata['user_id'])) {
        $promoSection = true;
        $promoCodeString = 'first10';
    }
}

if (isset($_SESSION['total_cart']) && $_SESSION['total_cart'] > 50) {
    $promoSection = true;
    $promoCodeString = 'delicius20';
}


if (isset($_POST['promo']) && strlen($_POST['promo']) > 0) {

    $promoCode = substr($_POST['promo'], -2);
    $_SESSION['promo'] = ['percentage' => $promoCode,];

    if (isset($_SESSION['promo']) && !isset($_SESSION['promoUsed'])) {

        switch ($promoCode) {
            case '10':
                $total = $_SESSION['total_cart'] * 0.90;
                break;
            case '15':
                $total = $_SESSION['total_cart'] * 0.85;
                break;
            case '20':
                $total = $_SESSION['total_cart'] * 0.80;
                break;
        }
        $_SESSION['total_cart'] = number_format($total, 2);
    }
    $_SESSION['promoUsed'] = true;
} else {

    //rever a validacao do promo code
    //posso nao inserir nada que vai dar continuidade
    $_SESSION['promo-alert'] = 'Please insert a valid code';
}



include 'src/Views/checkout.php';
