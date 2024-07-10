<?php

declare(strict_types=1);

namespace PizzaApp\Services;

use PizzaApp\Data\UsersDAO;

class UserServices
{
    protected $dbUser;

    public function __construct()
    {
        $this->dbUser = new UsersDAO();
    }

    public function createUser($data)
    {
        $this->dbUser->create($data);
    }
}
