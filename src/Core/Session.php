<?php

declare(strict_types=1);

namespace PizzaApp\Core;

class Session
{

    public static function logout()
    {
        $_SESSION = [];
        session_destroy();
        $paramsCookie = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $paramsCookie['path'], $paramsCookie['domain']);

        header('location:/pizzawinkel_app/');
        exit();
    }
}
