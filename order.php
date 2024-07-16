<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';

use PizzaApp\Bussiness\OrderServices;

$order = new OrderServices();

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
        'notes' => '',
    ];

    $order->cart = $_SESSION['cart'];

    //check if the postcode is avaiable to delivery
    $postcodeDelivery = $order->isDeliveryAvailable($client['postcode_number']);
    if ($postcodeDelivery['delivery_place'] === 0) {
        $order->errors('error-postcode', 'This postcode is not available for delivery');
    }
    //insert first delivery data

    $lastInsertIdDelivery = $order->createDeliveryAndGetId($client);

    //insert the order data
    $user = $order->user;
    //check if is user or guest
    if (isset($_SESSION['client']['user_id'])) {
        $user = $_SESSION['client']['user_id'];
    }

    $orderData = [
        'user_id' => $user,
        'delivery_id' => $lastInsertIdDelivery['id'],
        'status' => 'Paid',
        'order_date' => date('Y-m-d H:i:s')
    ];

    $lastInsertIdOrder = $order->createOrderAndGetId($orderData);

    //insert the orderItems data
    $order->createOrderItems($order->cart, $lastInsertIdOrder['id']);


    $_SESSION['orderPlaced'] = true;
    if ($order->user == 0) {
        unset($_SESSION['client']);
    }
    unset($_SESSION['cart']);
    $_SESSION['alertLogin'] = 'Your order has been placed successfully';
    header('Location: /pizzawinkel_app/index.php');
    exit();
}
