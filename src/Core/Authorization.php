<?php

declare(strict_types=1);

namespace PizzaApp\Core;

class Authorization
{
    public static function isLogIn()
    {
        if (!isset($_SESSION['admin']) && $_SESSION['admin'] != 'admin') {
            header('location: ./index.php');
            exit();
        }
    }
}
