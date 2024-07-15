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
        return $this->db->query("SELECT * FROM orders WHERE user_id = :id", [':id' => $id])->find();
    }
}
