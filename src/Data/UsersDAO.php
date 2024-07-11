<?php

declare(strict_types=1);

namespace PizzaApp\Data;

use PizzaApp\Core\Database;

class UsersDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers()
    {
        return $this->db->query("SELECT * FROM `users`")->findAll();
    }
    public function create($data)
    {
        $this->db->query("INSERT INTO `users` (`postcode_id`,`first_name`, `last_name`,`phone_number`,`adress`, `password`, `email`) VALUES (:postcode_id,:first_name, :last_name,:phone_number,:adress, :password, :email);", [
            ':first_name' => $data['firstName'],
            ':last_name' => $data['lastName'],
            ':phone_number' => $data['phoneNumber'],
            ':postcode_id' => $data['postcode'],
            ':adress' => $data['adress'],
            ':password' => $data['password'],
            ':email' => $data['email'],
        ]);
    }

    public function getPostcodeID($postcode)
    {
        return  $this->db->query("SELECT postcode_id FROM `postcode` WHERE postcode_number = :postcode", ['postcode' => $postcode])->find();
    }
}
