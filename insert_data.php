<?php
include '../config/database_connection.php';
try{
// Prepare SQL statement
$sql = "INSERT INTO test (name, price, quantity) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$name = "Product A";
$price = 10.99;
$quantity = 5;
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $price);
$stmt->bindParam(3, $quantity);

// Execute the statement
if ($stmt->execute()) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
