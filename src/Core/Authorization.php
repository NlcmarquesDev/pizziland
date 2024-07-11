<?php

declare(strict_types=1);

namespace PizzaApp\Core;

class Authorization
{
    public static function clientUnregister()
    {
        if (!isset($_SESSION['client'])) {
            header('location: ./index.php');
            exit();
        }
    }

    public static function clientRegister()
    {
        if (isset($_SESSION['client'])) {
            header('location: ./index.php');
            exit();
        }
    }
}
