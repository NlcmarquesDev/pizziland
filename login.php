<?php
session_start();

use PizzaApp\Core\Authentication;
use PizzaApp\Core\Authorization;

require_once 'vendor/autoload.php';

Authorization::clientRegister();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $dataLogin = [
        htmlspecialchars($_POST["email"]),
        $_POST["password"]
    ];

    $auth = Authentication::auth($dataLogin);

    // var_dump($auth);
    // die();

    if (!$auth) {
        $_SESSION['errors'] = "Login incorrect, please try again!";
        header('Location: /pizzawinkel_app/login.php');
        exit();
    }
    $_SESSION['alertLogin'] = "Login successful!";
    include 'index.php';
}


include 'src/Views/login.php';
