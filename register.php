<?php
session_start();
require_once 'vendor/autoload.php';

use PizzaApp\Core\Authorization;
use PizzaApp\Core\ValidationInputs;
use PizzaApp\Bussiness\RegisterServices;

require_once 'src/Core/functions.php';
$checkoutForm = checkform();

Authorization::clientRegister();

$registerService = new RegisterServices();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Create an array with the inputs to check validation
    $dataInput = [
        $firstName = htmlspecialchars($_POST['firstname']),
        $lastName = htmlspecialchars($_POST['lastname']),
        $adress = htmlspecialchars($_POST['adress']),
        $city = htmlspecialchars($_POST['city']),
        $postcode = htmlspecialchars($_POST['postcode']),
        $phoneNumber = htmlspecialchars($_POST['phone'])
    ];

    $verificationInputs = ValidationInputs::validateFields($dataInput);

    $postcodeId = $registerService->checkPostCode($dataInput[4]);

    $registerService->validationInputs($postcodeId, "Please insert a valid postcode");
    $registerService->validationInputs($verificationInputs, "Please insert all the fields");


    $dataClient = [
        "first_name" => htmlspecialchars($_POST['firstname']),
        "last_name" => htmlspecialchars($_POST['lastname']),
        "adress" => htmlspecialchars($_POST['adress']),
        "city" => htmlspecialchars($_POST['city']),
        "postcode_id" => $postcodeId['postcode_id'],
        "phone_number" => htmlspecialchars($_POST['phone'])
    ];
    //if the switch is on to save the client on the database;
    if (isset($_POST['password']) && isset($_POST['email'])) {

        $dataRegisterInputs = [
            $email = htmlspecialchars($_POST['email']),
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        $verificationRegisterInputs = ValidationInputs::validateFields($dataRegisterInputs);
        $registerService->validationInputs($verificationRegisterInputs, "Please insert all the fields");

        $dataClient['email'] = $email;
        $dataClient['password'] = $password;

        $registerService->createNewUser($dataClient);
    }

    $registerService->createSessionClient($dataClient);
}

include 'src/Views/register.php';
