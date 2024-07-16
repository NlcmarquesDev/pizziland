<?php

/**
 * Checks if the 'client' key is set in the $_SESSION array.
 *
 * @return bool
 */
function checkform()
{
    if (isset($_SESSION['client'])) {
        return true;
    }
    return false;
}
