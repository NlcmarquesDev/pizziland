<?php

declare(strict_types=1);

namespace PizzaApp\Entities;

class Cart
{
    public static function totalPricePerPizza($price, $quantity = 1)
    {
        return $price * $quantity;
    }

    public static function totalPriceCart($arrayPizzas)
    {
        $totalprice = 0;
        foreach ($arrayPizzas as $pizza) {
            $totalprice += $pizza['pizza_price'];
        }
        return $totalprice;
    }
    public static function pricePerSize($price, $size)
    {
        $newPrice = 0;

        switch ($size) {
            case 'medium':
                $newPrice = $price * 1.1;
                break;
            case 'large':
                $newPrice = $price * 1.15;
                break;
            case 'xl':
                $newPrice = $price * 1.2;
                break;
            default:
                $newPrice = $price;
                break;
        }
        return number_format($newPrice, 2);
    }
}
