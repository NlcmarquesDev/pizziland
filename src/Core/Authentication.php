<?php

declare(strict_types=1);

namespace PizzaApp\Core;

use PizzaApp\Data\UsersDAO;
use PizzaApp\Core\ValidationInputs;

class Authentication
{
    public static function validate($data)
    {
        $validationUser = ValidationInputs::validateFields($data);
        //posso fazer uma verificacao de cada entrada escrita
        if (!$validationUser) {
            return false;
        }
        return true;
    }

    public static function auth($data)
    {

        $form = self::validate($data);
        if (!$form) {
            return false;
        }
        $dataLogin = [
            'email' => $data[0],
            'password' => $data[1]
        ];

        $users = new UsersDAO();
        $userData = $users->getUsersDataByEmail($dataLogin['email']);

        $auth = ValidationInputs::validateUser($dataLogin['email'], $dataLogin['password'], $userData);

        if (!$auth) {
            return false;
        }
        self::createSessionAdmin($userData);
        return true;
    }
    public static function createSessionAdmin($name)
    {
        $_SESSION['client'] = $name;
    }
}
