<?php

declare(strict_types=1);

namespace PizzaApp\Core;

class ValidationInputs
{
    public static function validateString($string)
    {
        $trimmed = trim($string);

        if (strlen($trimmed) !== 0) {
            return true;
        }
        return false;
    }

    public static function validateUser($email, $password, $adminData)
    {
        if ($adminData['email'] == $email &&  password_verify($password, $adminData['password'])) {
            return true;
        }
        return false;
    }

    public static function validateFields($fieds)
    {
        for ($i = 0; $i < count($fieds); $i++) {

            $result = self::validateString($fieds[$i]);
            if (!$result)
                return false;
        }
        return true;
    }
}
