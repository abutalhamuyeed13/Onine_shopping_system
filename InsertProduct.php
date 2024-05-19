<?php
require '../models/Product.php';
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['discount_price'])) {
    if (!empty($_POST['name'])) {
        if (!empty($_POST['description'])) {
            if (!empty($_POST['price'])) {
                $file_path=null;
                    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowed_types = array("image/jpeg", "image/png", "image/gif");

        // Check if the file type is allowed
        if (in_array($_FILES["image"]["type"], $allowed_types)) {
            // Specify the directory where you want to save the uploaded files
            $upload_dir = "uploads/";

            // Generate a unique file name to avoid overwriting existing files
            $file_name = uniqid() . '_' . $_FILES["image"]["name"];

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $file_name)) {
                // Insert file path into the database
                $file_path = $upload_dir . $file_name;
                
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File type not allowed.";
        }
                    }    
                        
                        $name = sanitize($_POST['name']);
                        $description = sanitize($_POST['description']);
                        $price = sanitize($_POST['price']);
                        $discount_price = sanitize($_POST['discount_price']);
                       


                        $result = insertProduct( $name, $description, $price, $discount_price,$file_path);
                        if ($result) {
                            header('Location: ../views/products.php?create=true');
                        } else {
                            header('Location: ../views/products.php?create=false');
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