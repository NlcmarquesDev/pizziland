<?php
session_start();
require_once('vendor/autoload.php');
require_once 'src/Core/functions.php';
$checkoutForm = checkform();

use PizzaApp\Data\PizzasDAO;
use PizzaApp\Data\PizzasSizesDAO;

$pizzas = new PizzasDAO();

$allPizzas = $pizzas->getAllPizzas();

$sizes = new PizzasSizesDAO();
$pizzasSizes = $sizes->getAllSizes();

include 'src/Views/menu.php';
