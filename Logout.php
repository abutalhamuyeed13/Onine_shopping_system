<?php

setcookie('logged_user', '', time() - (86400 * 30), "/");
session_start();
session_destroy();
header('Location: ../views/login.php');
exit();
