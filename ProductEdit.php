<?php
require '../models/Product.php';
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['discount_price'])) {
    if (!empty($_POST['name'])) {
        if (!empty($_POST['description'])) {
            if (!empty($_POST['price'])) {
                
                    
                        
                        
                        $name = sanitize($_POST['name']);
                        $description = sanitize($_POST['description']);
                        $price = sanitize($_POST['price']);
                        $discount_price = sanitize($_POST['discount_price']);
                       


                        $result = updateProduct($_GET['id'], $name, $description, $price, $discount_price);
                        if ($result) {
                            header('Location: ../views/products.php?edit=true');
                        } else {
                            header('Location: ../views/products.php?edit=false');
                        }
                   
                
            } else {
                header('Location: ../views/products.php?error=price');
            }
        } else {
            header('Location: ../views/products.php?error=description');
        }
    } else {
        header('Location: ../views/products.php?error=name');
    }
} else {
    header('Location: ../views/products.php?error=invalid');
}



function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
