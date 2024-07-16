<?php

declare(strict_types=1);

namespace PizzaApp\Bussiness;

use PizzaApp\Data\PizzasDAO;

class IndexServices
{
    protected $pizza;
    public function __construct()
    {
        $this->pizza = new PizzasDAO();
    }

    public function getBestPizzas($value = 8)
    {
        return $this->pizza->getBestPizzas($value);
    }
}
