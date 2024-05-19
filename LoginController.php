<?php
//
//namespace App\Classes;
//
//class LoginController extends Action
//{
//    static public function login()
//    {
//        include_once "view/home.php";
//    }
//
//    static public function processLogin()
//    {
//        require 'db.php';
//
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $email = $_POST['email'];
//            $password = $_POST['password'];
//
//            $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
//            $stmt->bind_param("s", $email);
//
//            $stmt->execute();
//            $stmt->store_result();
//            $stmt->bind_result($hashed_password);
//
//            if ($stmt->num_rows > 0) {
//                $stmt->fetch();
//                if (password_verify($password, $hashed_password)) {
//                    session_start();
//                    $_SESSION['user'] = $email;
//                    header("Location: index.php?page=dashboard");
//                    exit();
//                } else {
//                    echo "Invalid email or password!";
//                }
//            } else {
//                echo "Invalid email or password!";
//            }
//            $stmt->close();
//        }
//        $conn->close();
//    }
//}
//?>
