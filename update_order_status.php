<?php

include '../config/database_connection.php';


 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $orderId = $_POST['orderId'] ?? ''; // Use null coalescing operator to avoid undefined index notice
     $status = $_POST['status'] ?? '';

     $sql = "UPDATE orders SET status = ? WHERE id = ?";
     $stmt = $conn->prepare($sql);

     try{
        $stmt->execute([$status, $orderId]);
      }catch(PDOException $e) {
          echo "Database error: " . $e->getMessage();
      }
 }
?>
