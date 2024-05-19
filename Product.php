<?php

function insertProduct($name,$description,$price,$discount_price,$file_path)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO products (name,description,price,discount_price,file_path ) VALUES (?, ?, ?, ?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdds", $name, $description, $price, $discount_price, $file_path);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();

    return $result;
}

function updateProduct($id, $name, $description,$price,$discount_price)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE products SET name = ?, description = ?, price = ?, discount_price = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssddi", $name,$description, $price, $discount_price, $id);
    $result = $stmt->execute();

    if ($result) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();

        return $row;
    } else {
        $stmt->close();
        $conn->close();

        return false;
    }
}

function getProduct($id)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row;
}
function getProducts()
{

 $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        array_push($products, $row);
    }

    $stmt->close();
    $conn->close();

    return $products;
}
function deleteProduct($product_id)
{
    $conn = mysqli_connect("localhost", "root", "", "online_shop");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true; 
    } else {
        $stmt->close();
        $conn->close();
        return false; 
    }
}

