<?php

declare(strict_types=1);

namespace PizzaApp\Data;

use PizzaApp\Core\Database;

class PizzasSizesDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllSizes()
    {
        return $this->db->query("SELECT * FROM `pizza_sizes`")->findAll();
    }
    public function getNameById($sizeId)
    {
        return $this->db->query("SELECT * FROM `pizza_sizes` WHERE size_id = :id", [':id' => $sizeId])->find();
    }
}
