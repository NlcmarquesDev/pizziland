<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pizza = [
        'pizza_id' => $_POST['pizza_id'],
        'pizza_name' => $_POST['pizza_name'],
        'pizza_description' => $_POST['pizza_description'],
        'pizza_price' => $_POST['pizza_price'],
        'pizza_image' => $_POST['pizza_image'],
        'pizza_size' => $_POST['size'],
    ];


    $_SESSION['cart'][] = $pizza;

    header('Location: /pizzawinkel_app/menu.php');
    exit();
}
