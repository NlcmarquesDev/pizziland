<?php

function checkform()
{
    if (isset($_SESSION['client'])) {
        return true;
    }
    return false;
}
