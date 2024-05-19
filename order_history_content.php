<style>
.history {
    display: flex;
    width: 100%;
    justify-content: space-around; /* Adjust spacing between the blocks */
    padding: 20px;
  }
.history-card {
    border: 1px solid #ccc;
    width: 45%; /* Adjust width for responsiveness */
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Optional shadow for better visibility */
    margin-right: 10px;
  }
.history-card h2 {
    font-size: 16px;
    color: #333;
    margin: 5px 0;
  }
.history-details {
    font-size: 14px;
    color: #666;
    line-height: 1.5;
  }

</style>

<div class="history">
    <?php       
            include_once '../config/database_connection.php';
            include_once '../database/retreive_data.php';

            $orders_delivered = getAllOrdersDelivered($conn);
            foreach ($orders_delivered as $row){
      
                $product = getProductsById($conn,$row->product_id);
                echo "<div class='history-card'>";
                echo "<h2>" . htmlspecialchars($row->status) . "</h2>";
                echo "<div class='history-details'>";
                echo "<strong>Customer ID:</strong> " . htmlspecialchars($row->customer_id) . "<br>";
                echo "<strong>" . htmlspecialchars($product["name"]) . "</strong><br>";
                echo "<strong>Order ID:</strong> " . htmlspecialchars($row->order_no) . "<br>";
                echo "</div>";
                echo "</div>";
                
            } 
    ?>

</div>
