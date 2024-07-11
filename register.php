<?php
session_start();
require_once 'vendor/autoload.php';

use PizzaApp\Core\ValidationInputs;
use PizzaApp\Services\UserServices;

$users = new UserServices();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //criar a validacao para cada input
    $dataInput = [
        $firstName = htmlspecialchars($_POST['firstname']),
        $lastName = htmlspecialchars($_POST['lastname']),
        $adress = htmlspecialchars($_POST['adress']),
        $city = htmlspecialchars($_POST['city']),
        $postcode = htmlspecialchars($_POST['postcode']),
        $phoneNumber = htmlspecialchars($_POST['phone'])
    ];

    $verificationInputs = ValidationInputs::validateFields($dataInput);

    $postcodeId = $users->getPostcodeID($dataInput[4]);

    if (!$postcodeId) {
        $_SESSION['errors'] = "Please insert a valid postcode";
        header("Location: /pizzawinkel_app/register.php");
        exit();
    }

    if (!$verificationInputs) {
        $_SESSION['errors'] = "Please insert all the fields";
        header("Location: /pizzawinkel_app/register.php");
        exit();
    }

    $dataClient = [
        "firstName" => htmlspecialchars($_POST['firstname']),
        "lastName" => htmlspecialchars($_POST['lastname']),
        "adress" => htmlspecialchars($_POST['adress']),
        "city" => htmlspecialchars($_POST['city']),
        "postcode" => $postcodeId['postcode_id'],
        "phoneNumber" => htmlspecialchars($_POST['phone'])
    ];


    if (isset($_POST['password']) && isset($_POST['email'])) {

        $dataRegisterInputs = [
            $email = htmlspecialchars($_POST['email']),
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        $verificationRegisterInputs = ValidationInputs::validateFields($dataRegisterInputs);
        if (!$verificationRegisterInputs) {
            $_SESSION['errors'] = "Please insert all the fields";
            header("Location: /pizzawinkel_app/register.php");
            exit();
        }

        $dataClient['email'] = $email;
        $dataClient['password'] = $password;


        $users->createUser($dataClient);
        $_SESSION['alert'] = "Users registered successfully";
    }

    $_SESSION['client'] = $dataClient;
    header("Location: /pizzawinkel_app/checkout.php");
    exit();






    // criar validacao para os input de pass e email
    //bcrypt($_POST['phone']);



    // criar uma funcao para criar $_SESSION
    // criar a sessao de sers para ir directo ao checkout sem criar registo na base de dados
    // verificar todos os dados para quando for criar a ordem ter esses dados no delivery


    //após isso ter mensagem de sucesso
    //rederecionar para o checkout page com todos os producxtos e dados do cliente




    var_dump("criar session");
    die();
}





include 'src/Views/register.php';
