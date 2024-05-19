<?php
include '../controllers/LoggedCheck.php';
if (!loggedCheck()) {
    header('Location: ./login.php');
    exit();
}

require '../models/Product.php';
$products = getProducts();
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
    
    
    <header>
        <h1>Product Manager</h1>
    </header>
   
    <?php
    include('./nav.php');
    ?>
    <hr>
    <div style="border: 1px solid black; margin: 10px; padding: 10px;">
    <?php

    if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
        echo "<span class='success'>Please fill up all the fields properly.</span><br>";
    }
    if (isset($_GET['edit'])) {
        if ($_GET['edit'] == 'true') {
            echo "<span class='success'>Product updated successfully.</span><br>";
        } 
        
    }
    if (isset($_GET['create'])) {
    if ($_GET['create'] == 'true') {
            echo "<span class='success'>Product created successfully.</span><br>";
        } 
    }
    if (isset($_GET['delete'])) {
    if ($_GET['delete'] == 'true') {
            echo "<span class='success'>Product Deleted successfully.</span><br>";
        } 
    }
    ?>

    <form action="../controllers/InsertProduct.php" method="POST" enctype="multipart/form-data" >
        <label for="name"> Name </label>
        <input type="text" name="name" id="name" placeholder="Enter Product Name" value="">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'name') {
            echo "<br><span class='error'>Name is required.</span>";
        }
        ?>
        <br>
        <label for="image"> Image </label>
        <input type="file" name="image" id="image" placeholder="upload Image" value="">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'image') {
            echo "<br><span class='error'>Invalid Image.</span>";
        }
        ?>
        <br>
        <label for="description"> Description </label>
        <input type="text" name="description" id="description" placeholder="Enter Product Description" value="">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'description') {
            echo "<br><span class='error'>Description is required.</span>";
        }
        ?>
        <br>
        <label for="price"> Price </label>
        <input type="number" name="price" id="price" placeholder="Enter Product Price" value="">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'price') {
            echo "<br><span class='error'>Price is required.</span>";
        }
        ?>
        <br>
        <label for="discount_price"> Discount Price </label>
        <input type="number" name="discount_price" id="discount_price" placeholder="Enter Product Discount price" value="">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'discount_price') {
            echo "<br><span class='error'>Invalid Discount Price.</span>";
        }
        ?>
       
        <br>
        <button> Create Product</button>
    </form>
</div>
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Products</th>
                <th> Description</th>
                <th> Price ($)</th>
                <th> Discount Price ($)</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($products) == 0) {
                echo '<tr><td colspan="5">No Product Found!</td></tr>';
            }
            foreach ($products as $key => $item) {
            ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                   
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['description']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['discount_price']; ?></td>
                    <td>

                    <a href="./editProduct.php?id=<?php echo $item['id']; ?>">Edit </a> 
                    <a href="../controllers/ProductDelete.php?id=<?php echo $item['id']; ?>">Delete </a> 
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    require './footer.php';
    ?>
</body>

</html>