<?php

declare(strict_types=1);

namespace PizzaApp\Bussiness;

use PizzaApp\Data\OrdersDAO;
use PizzaApp\Data\DeliveryDAO;
use PizzaApp\Data\OrderItemsDAO;

class DeliveryServices
{

    protected $dbOrder;
    protected $dbDelivery;
    protected $dbOrderItems;

    public function __construct()
    {
        $this->dbOrder = new OrdersDAO();
        $this->dbDelivery = new DeliveryDAO();
        $this->dbOrderItems = new OrderItemsDAO();
    }

    public function getLastOrderId()
    {
        $lastId =  $this->dbOrder->getLastId();
        return $lastId['id'];
    }

    public function getLastUserData($orderId)
    {
        $deliveryId = $this->dbOrder->getOrdersByUserID($orderId);

        $dataUser = $this->dbDelivery->getDeliverByIdy($deliveryId['delivery_id']);
        return $dataUser;
    }

    public function getOrderItemsfromOrderId($orderId)
    {
        return $this->dbOrderItems->getOrdersByUserID($orderId);
    }
}
