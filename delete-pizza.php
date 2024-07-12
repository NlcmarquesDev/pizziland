<?php
session_start();
require_once('vendor/autoload.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $array = $_SESSION['cart'];
    $index = (int)$_POST['delete'];
    unset($array[$index]);
    $_SESSION['cart'] = array_values($array);


    // $_SESSION['alert'] = 'Movie deleted successfully from your basket';
}

header('location:/pizzawinkel_app/menu.php');
exit();
