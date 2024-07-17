<?php

declare(strict_types=1);

namespace PizzaApp\Bussiness;

use PizzaApp\Data\OrdersDAO;
use PizzaApp\Data\PizzasDAO;
use PizzaApp\Data\DeliveryDAO;
use PizzaApp\Data\OrderItemsDAO;
use PizzaApp\Data\PizzasSizesDAO;

class DeliveryServices
{

    protected $dbOrder;
    protected $dbDelivery;
    protected $dbOrderItems;
    protected $dbPizzas;
    protected $dbPizzaSize;

    public function __construct()
    {
        $this->dbOrder = new OrdersDAO();
        $this->dbDelivery = new DeliveryDAO();
        $this->dbOrderItems = new OrderItemsDAO();
        $this->dbPizzas = new PizzasDAO();
        $this->dbPizzaSize = new PizzasSizesDAO();
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

    public function getNamePizza($pizzaId)
    {
        $pizzaName =  $this->dbPizzas->getNameById($pizzaId);
        return $pizzaName['pizza_name'];
    }
    public function getSizePizza($sizeId)
    {
        $pizzaSize =  $this->dbPizzaSize->getNameById($sizeId);
        return $pizzaSize['pizza_size'];
    }
}
