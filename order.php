<?php
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';

use PizzaApp\Data\PostcodeDAO;

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paymentMethod = $_POST['paymentMethod'];
    $totalOrder = $_SESSION['total_cart'];
    $client = [
        'first_name' => htmlentities($_POST['firstName']),
        'last_name' => htmlentities($_POST['lastName']),
        'adress' => htmlentities($_POST['address']),
        'city' => htmlentities($_POST['city']),
        'postcode_number' => htmlentities($_POST['postcode']),
        'phone_number' => htmlentities($_POST['phoneNumber']),
        'email' => htmlentities($_POST['email']),
    ];
    $cart = $_SESSION['cart'];

    $postcode = new PostcodeDAO();


    $postcodeDelivery = $postcode->isDeliveryAvailable($client['postcode_number']);
    if ($postcodeDelivery['delivery_place'] === 0) {
        var_dump($postcodeDelivery);

        $_SESSION['error-postcode'] = 'This postcode is not available for delivery';
        header('Location: /pizzawinkel_app/checkout.php');
        exit();
    }
}
//checkar se o post code pertence ao posicao de entrega , caso nao fazer um alerta para dizer que esse postcode nao se encontra disponivel para entrega






//1. insert into delivery table
                // delivery username, vai conter o fisrt and last name
                //delivery adress , morada
                //delivery city , cidade
                //delivery phone
                //delivery email, caso tenha , caso nao leva em branco ,
                ///delivery postcode



//order table
// user_id  , caso seja guest ele vai criar uma string a dizer 'guest'
