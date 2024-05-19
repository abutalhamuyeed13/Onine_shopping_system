<?php
include '../controllers/LoggedCheck.php';
if (!loggedCheck()) {
    header('Location: ./login.php');
    exit();
}
$user = $_SESSION['logged_user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Food Delivery System</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <header>
        <h1>Edit Profile</h1>
    </header>
    <hr>
    <?php
    include('./nav.php');
    ?>
    <hr>
    <?php

    if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
        echo "<span class='success'>Please fill up all the fields properly.</span><br>";
    }
    if (isset($_GET['edit'])) {
        if ($_GET['edit'] == 'true') {
            echo "<span class='success'>Profile updated successfully.</span><br>";
        } else {
            echo "<span class='error'>Profile update failed. Please try again.</span><br>";
        }
    }
    ?>
    <form action="../controllers/EditProfile.php" method="POST" onsubmit="return registrationValidation()">
        <label for="name"> Name </label>
        <input type="text" name="name" id="name" placeholder="Enter Your Name" value="<?php echo $user['name']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'name') {
            echo "<br><span class='error'>Name is required.</span>";
        }
        ?>
        <br>
        <label for="email"> Email </label>
        <input type="email" name="email" id="email" placeholder="Enter Your Email" value="<?php echo $user['email']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'email') {
            echo "<br><span class='error'>Email is required.</span>";
        }
        ?>
        <br>
        <label for="phone"> Phone </label>
        <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number" value="<?php echo $user['phone']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'phone') {
            echo "<br><span class='error'>Phone number is required.</span>";
        }
        ?>
        <br>
        <label for="password"> Password </label>
        <input type="password" name="password" id="password" placeholder="Enter Your Password" value="<?php echo $user['password']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'password') {
            echo "<br><span class='error'>Password is required & it should be at least 8 characters.</span>";
        }
        ?>
        <br>
        <label for="address"> Address </label>
        <input type="text" name="address" id="address" placeholder="Enter Your Address" value="<?php echo $user['address']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'address') {
            echo "<br><span class='error'>Address is required.</span>";
        }
        ?>
        <br>
        <button> Update </button>
    </form>

    <?php
    require './footer.php';
    ?>

    <script src="./js/main.js"></script>
</body>

</html>