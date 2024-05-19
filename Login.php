<?php
require '../models/User.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['email'])) {
        if (!empty($_POST['password']) || strlen($_POST['password']) < 8) {
            $email = sanitize($_POST['email']);
            $password = sanitize($_POST['password']);
            $result = loginUser($email, $password);
            if ($result) {
                session_start();

                $user = json_encode($result);
                if (isset($_POST['remember_me'])) {
                    setcookie('logged_user', $user, time() + (86400 * 30), "/");
                } else {
                    setcookie('logged_user', $user, time() - (86400 * 30), "/");
                }

                $_SESSION['logged_user'] = $result;
                header('Location: ../views/profile.php');
            } else {
                header('Location: ../views/login.php?error=invalid');
            }
        } else {
            header('Location: ../views/login.php?error=invalid');
        }
    } else {
        header('Location: ../views/login.php?error=invalid');
    }
} else {
    header('Location: ../views/login.php?error=invalid');
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
