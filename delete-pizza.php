<?php

use PizzaApp\Entities\Cart;

session_start();
require_once('vendor/autoload.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $array = $_SESSION['cart'];
    $index = (int)$_POST['delete'];
    unset($array[$index]);
    $_SESSION['cart'] = array_values($array);

    $_SESSION['total_cart'] = Cart::totalPriceCart($_SESSION['cart']);
}

header('location:/pizzawinkel_app/menu.php');
exit();
