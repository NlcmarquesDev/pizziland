<?php


use PizzaApp\Data\PizzasDAO;

$pizzas = new PizzasDAO();

$allBestPizzas = $pizzas->getBestPizzas();

$checkoutForm = checkform();

include 'src/Views/home.php';
