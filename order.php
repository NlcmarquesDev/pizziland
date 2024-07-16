<?php
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';

use PizzaApp\Data\OrdersDAO;
use PizzaApp\Data\DeliveryDAO;
use PizzaApp\Data\PostcodeDAO;
use PizzaApp\Data\OrderItemsDAO;

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
        'notes' => '',
    ];
    $cart = $_SESSION['cart'];

    //check if the postcode is avaiable to delivery
    $postcode = new PostcodeDAO();
    $postcodeDelivery = $postcode->isDeliveryAvailable($client['postcode_number']);
    if ($postcodeDelivery['delivery_place'] === 0) {
        $_SESSION['error-postcode'] = 'This postcode is not available for delivery';
        header('Location: /pizzawinkel_app/checkout.php');
        exit();
    }


    //insert first delivery data
    $deliverys = new DeliveryDAO();
    $deliverys->createDelivery($client);

    $lastInsertIdDelivery = $deliverys->getLastId();

    //insert the order data
    $order = new OrdersDAO();
    $user = 0;
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

    $order->createOrder($orderData);
    $lastInsertIdOrder = $order->getLastId();

    //insert the orderItems data
    $orderItems = new OrderItemsDAO();
    foreach ($cart as $orderItem) {
        // var_dump($orderItem);
        // die();
        $orderItems->createOrder($orderItem, $lastInsertIdOrder);
    }


    $_SESSION['alertLogin'] = 'Your order has been placed successfully';
    header('Location: /pizzawinkel_app/index.php');
    exit();
}





//order items
    //order
// user_id  , caso seja guest ele vai criar uma string a dizer 'guest'
