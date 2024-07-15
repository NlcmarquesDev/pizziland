<?php

declare(strict_types=1);

namespace PizzaApp\Entities;

class Cart
{
    protected array $pizza;
    protected int $quantity;
    public function __construct($pizza, $quantity)
    {
        $this->$pizza = $pizza;
        $this->quantity = $quantity;
    }

    public function totalPricePerPizza()
    {
        // return $this->pizza[]
    }

    public function totalPriceCart()
    {
        // return $this->pizza['']
    }
    public function pricePerSize()
    {
    }
}
