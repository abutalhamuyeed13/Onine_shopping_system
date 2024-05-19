<?php
// MySQL database credentials

$servername = "localhost";
$username = "root";
$password = "";
$database = "online_shopping_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $phone, $address);

    // Execute the statement
    if ($stmt->execute()) {
    echo "<p style='text-align:center;'>Registration successful!</p>";
} else {
    echo '<img src="assets/img/admin.jpg" alt="Abu Talha" style="width:100px; height:100px;">';
}

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>