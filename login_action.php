<?php
// Start the session
session_start();

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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute statement
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($userId, $hashedPassword);
    $stmt->fetch();

    if ($userId && password_verify($password, $hashedPassword)) {
        // Login successful, store user ID in session
        $_SESSION['userId'] = "owner";
        header("Location: route.php?page=admin");
        exit(); // Ensure script execution stops after redirect
    } else {
        header("Location: route.php?page=reg");
        exit(); // Ensure script execution stops after redirect
    }

    // Close statement
    $stmt->close();
}

// Check if logout button is pressed
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page or any other desired page
    header("Location: route.php?page=home");
    exit(); // Ensure script execution stops after redirect
}

// Close connection
$conn->close();
?>
