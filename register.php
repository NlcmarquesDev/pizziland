<?php

use PizzaApp\Services\UserServices;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //criar a validacao para cada input

    $firstName = htmlspecialchars($_POST['firstname']);
    $lastName = htmlspecialchars($_POST['lastname']);
    $adress = htmlspecialchars($_POST['adress']);
    $city = htmlspecialchars($_POST['city']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $phoneNumber = htmlspecialchars($_POST['phone']);

    if (strlen($_POST['password']) != 0 && strlen($_POST['email']) != 0) {
        // criar validacao para os input de pass e email

        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $users = new UserServices();
        $users->createUser([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'adress' => $adress,
            'city' => $city,
            'postcode' => $postcode,
            'phone_number' => $phoneNumber
        ]);
        var_dump('criar registo');
        die(); //bcrypt($_POST['phone']);


    } else {
        // criar uma funcao para criar $_SESSION
        // criar a sessao de sers para ir directo ao checkout sem criar registo na base de dados
        // verificar todos os dados para quando for criar a ordem ter esses dados no delivery

    }
    //após isso ter mensagem de sucesso
    //rederecionar para o checkout page com todos os producxtos e dados do cliente




    var_dump("criar session");
    die();
}





include 'src/Views/register.php';
