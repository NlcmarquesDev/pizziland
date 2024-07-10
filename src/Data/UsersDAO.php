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
        $this->db->query("INSERT INTO `users` (`first_name`, `last_name`,`phone_number`,`adress`, `password`, `email`) VALUES (`:first_name`, `:last_name`,`:phone_number`,`:adress`, `:password`, `:email`);", [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'adress' => $data['adress'],
            'password' => $data['password'],
            'email' => $data['email'],
        ]);
    }
}
