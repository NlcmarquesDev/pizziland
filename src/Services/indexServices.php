<?php
session_start();

use PizzaApp\Data\PizzasDAO;

$pizzas = new PizzasDAO();

$allBestPizzas = $pizzas->getBestPizzas();

include 'src/Views/home.php';
