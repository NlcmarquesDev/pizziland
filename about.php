<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'src/Core/functions.php';
$checkoutForm = checkform();

include 'src/Views/about.php';
