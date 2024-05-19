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
        <h2>About Us </h2>
        <p>Welcome to <b>Online Shopping System</b> , your one-stop online shopping destination!

At Online Shopping System, we believe in making shopping a delightful and hassle-free experience. Founded in 2024, our mission has always been to provide our customers with a wide range of high-quality products at competitive prices, all from the comfort of their homes.   Find the best deals on your favorite products.</p>
        <h3>Our Story</h3>
        <p>Our journey began with a simple idea: to create an online marketplace that offers something for everyone. Whether you're looking for the latest fashion trends, cutting-edge electronics, home essentials, or unique gifts, we have it all. Over the years, we've grown from a small startup into a thriving e-commerce platform, thanks to our loyal customers and dedicated team.</p>
        
    </section>
    <?php 
    include('./footer.php');
    ?>
</body>
</html>

