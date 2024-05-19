<?php
session_start();
function loggedCheck()
{
    if (!isset($_SESSION['logged_user'])) {
        if (isset($_COOKIE['logged_user'])) {
            $user = json_decode($_COOKIE['logged_user'], true);
            $_SESSION['logged_user'] = $user;
            return true;
        } else {
            return false;
        }
    }
    return true;
}
