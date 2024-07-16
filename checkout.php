<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';

use PizzaApp\Bussiness\CheckoutServices;
use PizzaApp\Core\Authorization;

$checkoutForm = checkform();

Authorization::clientUnregister();
$userdata = $_SESSION['client'];

$checkoutService = new CheckoutServices();
$userLocation = $checkoutService->allInfoPostcode($userdata['postcode_id']); //

if (isset($userdata['user_id'])) {
    $promoCodeString = $checkoutService->promoCodeFirstOrder($userdata['user_id']);
}
if (isset($_SESSION['total_cart'])) {
    $promoCodeString = $checkoutService->createPromoCodes();
}
//check if show the promocode button or not
$promoSection = $checkoutService->promoSection;

if (isset($_POST['promo']) && strlen($_POST['promo']) > 0) {

    $promoCode = substr($_POST['promo'], -2);
    $_SESSION['promo'] = ['percentage' => $promoCode,];

    if (isset($_SESSION['promo']) && !isset($_SESSION['promoUsed'])) {

        $total = $checkoutService->discountCode($promoCode);

        $_SESSION['total_cart'] = number_format($total, 2);
    }
    $_SESSION['promoUsed'] = true;
} else {
    $_SESSION['promo-alert'] = 'Please insert a valid code';
}



include 'src/Views/checkout.php';
