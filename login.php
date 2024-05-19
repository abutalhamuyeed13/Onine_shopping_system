
<?php
include '../controllers/LoggedCheck.php';
if (loggedCheck()) {
    header('Location: ./profile.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | Online Shopping System</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>
    <?php
    include ('./nav2.php')

    ?>
    <hr>
        <?php
    if (isset($_GET['error'])) {
        echo "<span class='error'>Authentication Failed.</span><br>";
    }
    ?>
     
    <form action="../controllers/Login.php" method="POST" onsubmit="return loginValidation()">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter Your Email">
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Your Password">
        <br><br>
        <input type="checkbox" name="remember_me" id="remember_me">
        <span>Remember Me</span>
        <br><br>
        <button>Login</button>

    </form>

    <br>
    <a href="./registration.php">Register</a>
    <?php
    require './footer.php';
    ?>

    <script src="./js/main.js"></script>
</body>
