<?php
session_start();
require_once 'src/Core/functions.php';
$checkoutForm = checkform();
include 'src/Views/contact.php';
