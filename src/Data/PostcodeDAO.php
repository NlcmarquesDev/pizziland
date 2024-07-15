<?php

declare(strict_types=1);

namespace PizzaApp\Data;

use PizzaApp\Core\Database;

class PostcodeDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPostcodes()
    {
        return $this->db->query("SELECT * FROM postcode")->findAll();
    }
    public function getPostcodeByID($postcodeId)
    {
        return $this->db->query("SELECT * FROM postcode WHERE postcode_id = :postcodeId", [':postcodeId' => $postcodeId])->find();
    }
    public function isDeliveryAvailable($postcodeNumber)
    {
        return $this->db->query("SELECT delivery_place FROM postcode WHERE postcode_number = :postcodeNumber", [':postcodeNumber' => $postcodeNumber])->find();
    }
}
