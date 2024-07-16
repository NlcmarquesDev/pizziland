<?php

declare(strict_types=1);

namespace PizzaApp\Data;

use PizzaApp\Core\Database;

class DeliveryDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function createDelivery($data)
    {
        $username = $data['first_name'] . ' ' . $data['last_name'];

        return $this->db->query("INSERT INTO `delivery`(`delivery_username`, `delivery_adress`, `delivery_postcode`, `delivery_phone`, `delivery_email`, `delivery_notes`) VALUES (:delivery_username, :delivery_adress, :delivery_postcode, :delivery_phone, :delivery_email, :delivery_notes); SELECT LAST_INSERT_ID() as id", [
            ':delivery_username' => $username,
            ':delivery_adress' => $data['adress'],
            ':delivery_postcode' => $data['postcode_number'],
            ':delivery_phone' => $data['phone_number'],
            ':delivery_email' => $data['email'],
            ':delivery_notes' => $data['notes'],
        ]);
    }
    public function getLastId()
    {
        return $this->db->getLastId('delivery', 'delivery_id');
    }
}
