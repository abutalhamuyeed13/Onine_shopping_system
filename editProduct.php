<?php
include '../controllers/LoggedCheck.php';
if (!loggedCheck()) {
    header('Location: ./login.php');
    exit();
}

require '../models/Product.php';
$product = getProduct($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Online Shopping System </title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Edit Product</h1>
    <hr>
    <?php
    include('./nav.php');
    ?>
    <hr>
    <div style="border: 1px solid black; margin: 10px; padding: 10px;">
    <?php

    if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
        echo "<span class='success'>Please fill up all the fields properly.</span><br>";
    }
    
    ?>

    <form action="../controllers/ProductEdit.php?id=<?php echo $product['id']; ?>" method="POST" >
        <label for="name"> Name </label>
        <input type="text" name="name" id="name" placeholder="Enter Product Name" value="<?php echo $product['name']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'name') {
            echo "<br><span class='error'>Name is required.</span>";
        }
        ?>
        <br>
        <label for="description"> Description </label>
        <input type="text" name="description" id="description" placeholder="Enter Product Description" value="<?php echo $product['description']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'description') {
            echo "<br><span class='error'>Description is required.</span>";
        }
        ?>
        <br>
        <label for="price"> Price </label>
        <input type="number" name="price" id="price" placeholder="Enter Product Price" value="<?php echo $product['price']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'price') {
            echo "<br><span class='error'>Price is required.</span>";
        }
        ?>
        <br>
        <label for="discount_price"> Discount Price </label>
        <input type="number" name="discount_price" id="discount_price" placeholder="Enter Product Discount price" value="<?php echo $product['discount_price']; ?>">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'discount_price') {
            echo "<br><span class='error'>Invalid Discount Price.</span>";
        }
        ?>
       
        <br>
        <button> Update Product</button>
    </form>
</div>
    
    <?php
    require './footer.php';
    ?>
</body>

</html>