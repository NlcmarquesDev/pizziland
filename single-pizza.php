<?php
session_start();
include 'src/Views/partials/header.php';

require_once 'vendor/autoload.php';
$pizzaId = $_GET['id'];


include 'src/Views/single-pizza.php';
