<?php

use PizzaApp\Core\Authorization;

session_start();
require_once 'vendor/autoload.php';

Authorization::clientUnregister();

include 'src/Views/checkout.php';
