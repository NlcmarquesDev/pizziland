<?php

use PizzaApp\Bussiness\IndexServices;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';

$checkoutForm = checkform();

$indexService = new IndexServices();

$allBestPizzas = $indexService->getBestPizzas();

include 'src/Views/home.php';
