<?php
session_start();
require_once 'vendor/autoload.php';

use PizzaApp\Entities\Cart;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pizza = [
        'pizza_id' => $_POST['pizza_id'],
        'pizza_name' => $_POST['pizza_name'],
        'pizza_description' => $_POST['pizza_description'],
        'pizza_price' => floatval($_POST['pizza_price']),
        'pizza_image' => $_POST['pizza_image'],
        'pizza_size' => $_POST['size'],
        'pizza_quantity' => 1,
    ];

    $priceUnitSize = Cart::pricePerSize($pizza['pizza_price'], $pizza['pizza_size']);

    $pizza['pizza_price'] = $priceUnitSize;

    $pizzaExists = false;
    // $pricePerQty = Cart::totalPricePerPizza($priceSize, $_POST['quantity']);
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$pizzaCart) {

            if ($pizza['pizza_name'] === $pizzaCart['pizza_name'] && $pizza['pizza_size'] === $pizzaCart['pizza_size']) {
                //change the quantity  ++
                $pizzaCart['pizza_quantity']++;
                $pizzaCart['pizza_price'] = Cart::totalPricePerPizza($pizza['pizza_price'], $pizzaCart['pizza_quantity']);
                $_SESSION['total_cart'] = Cart::totalPriceCart($_SESSION['cart']);
                header('Location: /pizzawinkel_app/menu.php');
                exit();
            } else {
                $pizzaExists = true;
            }
        }
    } else {
        $_SESSION['cart'][] = $pizza;
    }

    if ($pizzaExists) {
        $_SESSION['cart'][] = $pizza;
    }

    $_SESSION['total_cart'] = Cart::totalPriceCart($_SESSION['cart']);



    header('Location: /pizzawinkel_app/menu.php');
    exit();
}
