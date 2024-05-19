<?php
include '../controllers/LoggedCheck.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping System</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <h1>Online Shopping System</h1>
    </header>
     <?php
    
    if (loggedCheck()) {
    include('./nav.php');
    
}
    else
     {
        include('./nav2.php');
    }
    ?>

    <section>
        <h2>Contact Us </h2>
        <p><b>Phone: 09985476985<b></p>
        <p><b>Email: onlineshoppingsys@gmail.com</b></p>
        
        
    </section>
    <?php 
    include('./footer.php');
    ?>
</body>
</html>

