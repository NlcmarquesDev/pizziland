<?php

declare(strict_types=1);

namespace PizzaApp\Bussiness;

use PizzaApp\Data\UsersDAO;

// session_start();

class RegisterServices
{
    protected $users;
    public function __construct()
    {
        $this->users = new UsersDAO();
    }

    public function errors($message)
    {
        $_SESSION['errors'] = $message;
        header("Location: /pizzawinkel_app/register.php");
        exit();
    }

    public function validationInputs($value, $message)
    {
        if (!$value) {
            $this->errors($message);
        }
    }
    public function checkPostCode($postcodeNumber)
    {
        return $this->users->getPostcodeID($postcodeNumber);
    }

    public function createNewUser($dataClient)
    {
        $this->users->create($dataClient);
        $_SESSION['alert'] = "Users registered successfully";
    }

    public function createSessionClient($dataClient)
    {
        $_SESSION['client'] = $dataClient;


        header("Location: /pizzawinkel_app/checkout.php");
        exit();
    }
}
