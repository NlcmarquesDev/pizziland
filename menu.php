<?php
session_start();
require_once('vendor/autoload.php');
require_once 'src/Core/functions.php';
$checkoutForm = checkform();

use PizzaApp\Data\PizzasDAO;

$pizzas = new PizzasDAO();

$allPizzas = $pizzas->getAllPizzas();

include 'src/Views/menu.php';
