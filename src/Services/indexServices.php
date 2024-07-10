<?php

use PizzaApp\Data\PizzasDAO;

$pizzas = new PizzasDAO();

$allBestPizzas = $pizzas->getBestPizzas();
// echo '<pre>';
// var_dump($allPizzas);
// echo '</pre>';
// die();

include 'src/Views/home.php';
