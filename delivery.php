<?php

use PizzaApp\Data\DeliveryDAO;
use PizzaApp\Bussiness\DeliveryServices;

session_start();
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';

$deliveryService = new DeliveryServices();
//First the lastOrder

$orderId = $deliveryService->getLastOrderId();
//data From last order user
$lastUserData = $deliveryService->getLastUserData($orderId);

//data from order items for a specific order_id
$orderItemsData = $deliveryService->getOrderItemsfromOrderId($orderId);




//depois de ter a order_id posso requerir os dados da tabela de ordet_items assim conseguir os dados especificos de cada pizza.



include 'src/Views/delivery.php';
