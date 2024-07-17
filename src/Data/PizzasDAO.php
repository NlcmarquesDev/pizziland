<?php

declare(strict_types=1);

namespace PizzaApp\Data;

use PizzaApp\Core\Database;

class PizzasDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPizzas()
    {
        return $this->db->query("SELECT * FROM pizzas")->findAll();
    }
    public function getBestPizzas($value = 8)
    {
        return $this->db->query("SELECT * FROM pizzas LIMIT $value")->findAll();
    }

    public function getNameById($id)
    {
        return $this->db->query("SELECT * FROM pizzas WHERE pizza_id = :id", [':id' => $id])->find();
    }
}
