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
    <title>Profile | Online Shopping System</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
     
    <header>
        <h1>Profile</h1>
    </header>
    <?php
    include('./nav.php');
    ?>
    <hr>
    <section>
        Name:<?php echo $user['name']; ?>
        <br>
        Email:<?php echo $user['email']; ?>
        <br>
        Phone Num:<?php echo $user['phone']; ?>
        <br>
        Address: <?php echo $user['address']; ?>
        <br>
        <div style="margin-top:15px;">
            <a class="button" href="./edit.php">Edit</a>
        </div>
    </section>
    <?php
    require './footer.php';
    ?>

    <script src="./js/main.js"></script>

</body>

</html>