<?php

declare(strict_types=1);

namespace PizzaApp\Data;

use PizzaApp\Core\Database;

class OrdersDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllOrders()
    {
        return $this->db->query("SELECT * FROM orders")->findAll();
    }
    public function getOrdersByUserID($id)
    {
        return $this->db->query("SELECT * FROM orders WHERE order_id = :id", [':id' => $id])->find();
    }

    public function createOrder($data)
    {
        $this->db->query("INSERT INTO orders (user_id, delivery_id, status, order_date) VALUES (:user_id, :delivery_id, :status, :order_date)", [
            ':user_id' => $data['user_id'],
            ':delivery_id' => $data['delivery_id'],
            ':status' => $data['status'],
            ':order_date' => $data['order_date']
        ]);
    }
    public function getLastId()
    {
        return $this->db->getLastId('orders', 'order_id');
    }
}
