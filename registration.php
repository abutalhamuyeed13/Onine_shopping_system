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
    <title>Registration | Online Shopping System</title>

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
   <header>
        <h1>Registration</h1>
    </header>
    <?php
    include ('./nav2.php')

    ?>
    <?php
    if (isset($_GET['registration'])) {
        if ($_GET['registration'] == 'true') {
            echo '<span class="success">Registration successful.</span> Please <a href="./login.php">Login</a>.';
        } else {
            echo '<span class="error">Registration failed. Please try again.</span>';
        }
    }

    if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
        echo "<span class='error'>Please fill up all the fields properly.</span>";
    }
    ?>
    <br>
     
    <form action="../controllers/Registration.php" method="POST" onsubmit="return registrationValidation()">
        <label for="name"> Name </label>
        <input type="text" name="name" id="name" placeholder="Enter Your Name">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'name') {
            echo "<br><span class='error'>Name is required.</span>";
        }
        ?>
        <br>
        <label for="email"> Email </label>
        <input type="email" name="email" id="email" placeholder="Enter Your Email">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'email') {
            echo "<br><span class='error'>Email is required.</span>";
        }
        ?>
        <br>
        <label for="phone"> Phone </label>
        <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'phone') {
            echo "<br><span class='error'>Phone number is required.</span>";
        }
        ?>
        <br>
        <label for="password"> Password </label>
        <input type="password" name="password" id="password" placeholder="Enter Your Password">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'password') {
            echo "<br><span class='error'>Password is required & it should be at least 8 characters.</span>";
        }
        ?>
        <br>
        <label for="address"> Address </label>
        <input type="text" name="address" id="address" placeholder="Enter Your Address">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'address') {
            echo "<br><span class='error'>Address is required.</span>";
        }
        ?>
        <br>
        <button> Register </button>
    </form>
    <br>
    <a href="./login.php">Login</a>
    <?php
    require './footer.php';
    ?>
    <script src="./js/main.js"></script>
</body>

</html>