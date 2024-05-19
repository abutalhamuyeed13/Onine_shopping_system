<table>
    <tr>
        <th>Order list</th>
        <th>Assigned to</th>
        <th>Vehicle</th>
        <th>Rider Name</th>
    </tr>
    <?php
        include_once '../config/database_connection';
        include_once '../database/retreive_data.php';
        $vehicles = getAllVehicles($conn);
    
        foreach($vehicles as $vehicle){  
            echo "<tr>";
            echo "<td><strong>$vehicle->productName</strong><br>";
            echo "</td><td>$vehicle->orderNo</td><br>";
            echo "<td>$vehicle->vehicleName</td><br>";
            echo "<td>$vehicle->riderName</td><br>";
            echo "</tr>";
        }
    ?>
</table>
