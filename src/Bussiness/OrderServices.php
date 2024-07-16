<?php

declare(strict_types=1);

namespace PizzaApp\Bussiness;

use PizzaApp\Data\OrdersDAO;
use PizzaApp\Data\DeliveryDAO;
use PizzaApp\Data\PostcodeDAO;
use PizzaApp\Data\OrderItemsDAO;

class OrderServices
{
    protected $dbOrder;
    protected $dbDelivery;
    protected $dbPostcode;
    protected $dbOrderItems;
    public $cart = [];
    public $user = 0; //0 is guest and 1 is user from database

    public function __construct()
    {
        $this->dbOrder = new OrdersDAO();
        $this->dbDelivery = new DeliveryDAO();
        $this->dbPostcode = new PostcodeDAO();
        $this->dbOrderItems = new OrderItemsDAO();
    }
    public function isDeliveryAvailable($postcodeNumber)
    {
        return $this->dbPostcode->isDeliveryAvailable($postcodeNumber);
    }

    public function createDeliveryAndGetId($client)
    {
        $this->dbDelivery->createDelivery($client);
        return $this->dbDelivery->getLastId();
    }

    public function createOrderAndGetId($data)
    {
        $this->dbOrder->createOrder($data);
        return $this->dbOrder->getLastId();
    }

    public function createOrderItems($cart, $lastOrderId)
    {
        foreach ($cart as $orderItem) {
            $this->dbOrderItems->createOrder($orderItem, $lastOrderId);
        }
    }







    public function errors($session, $message)
    {
        $_SESSION[$session] = $message;
        header('Location: /pizzawinkel_app/checkout.php');
        exit();
    }
}
