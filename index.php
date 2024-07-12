<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'vendor/autoload.php';

require 'src/Services/indexServices.php';
