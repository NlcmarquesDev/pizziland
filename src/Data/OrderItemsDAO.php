<?php

declare(strict_types=1);

namespace PizzaApp\Data;

use PizzaApp\Core\Database;

class OrderItemsDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllOrdersItems()
    {
        return $this->db->query("SELECT * FROM orders_items")->findAll();
    }
    public function getOrdersByUserID($orderId)
    {
        return $this->db->query("SELECT * FROM order_items WHERE order_id = :id", [':id' => $orderId])->findAll();
    }

    public function createOrder($data, $orderId)
    {
        $this->db->query("INSERT INTO order_items (order_id, pizza_id, quantity, unit_price,size_id) VALUES (:order_id, :pizza_id, :quantity, :unit_price,:size_id)", [
            ':order_id' => (int)$orderId,
            ':pizza_id' => (int)$data['pizza_id'],
            ':quantity' => (int)$data['pizza_quantity'],
            ':unit_price' => floatval($data['pizza_price']),
            ':size_id' => (int)$data['pizza_size']
        ]);
    }
}
