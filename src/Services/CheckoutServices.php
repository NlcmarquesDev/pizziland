<?php

declare(strict_types=1);

namespace PizzaApp\Services;

use PizzaApp\Data\PostcodeDAO;

class CheckoutServices
{
    protected $dbUser;

    public function __construct()
    {
        $this->dbUser = new PostcodeDAO();
    }

    public function getPostcodeByID($postcode)
    {
        return $this->dbUser->getPostcodeByID($postcode);
    }
}
