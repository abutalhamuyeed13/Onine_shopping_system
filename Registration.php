<?php
require '../models/User.php';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['address'])) {
    if (!empty($_POST['name'])) {
        if (!empty($_POST['email'])) {
            if (!empty($_POST['phone'])) {
                if (!empty($_POST['password']) || strlen($_POST['password']) < 8) {
                    if (!empty($_POST['address'])) {
                        $name = sanitize($_POST['name']);
                        $email = sanitize($_POST['email']);
                        $phone = sanitize($_POST['phone']);
                        $password = sanitize($_POST['password']);
                        $address = sanitize($_POST['address']);

                        $result = insertUser($name, $email, $phone, $password, $address);

                        if ($result) {
                            header('Location: ../views/registration.php?registration=true');
                        } else {
                            header('Location: ../views/registration.php?registration=false');
                        }
                    } else {
                        header('Location: ../views/registration.php?error=address');
                    }
                } else {
                    header('Location: ../views/registration.php?error=password');
                }
            } else {
                header('Location: ../views/registration.php?error=phone');
            }
        } else {
            header('Location: ../views/registration.php?error=email');
        }
    } else {
        header('Location: ../views/registration.php?error=name');
    }
} else {
    header('Location: ../views/registration.php?error=invalid');
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
