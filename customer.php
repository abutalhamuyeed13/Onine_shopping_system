 
<style>
    table {
        width: 100%;
        border-collapse: collapse; /* Collapses the border lines between cells */
    }
    th, td {
        border: 1px solid #ddd; /* Adds a light grey border around table cells */
        padding: 8px; /* Adds space around text in each cell */
        text-align: left; /* Aligns text to the left side of the cell */
    }
    th {
        background-color: #f2f2f2; /* Light grey background for header cells */
    }
</style>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Customer name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Customer UUID</th>
        </tr>
    </thead>
    <tbody>
    <?php
    include_once '../config/database_connection.php';
    include_once '../database/retreive_data.php';

     
        $customers = getAllCustomers($conn);
    
        // Check if customers array is not empty and is an array
        
        foreach ($customers as $customer) {
            echo "<tr>";
            echo " <td> $customer->id</td>";
            echo " <td> $customer->name</td>";
            echo " <td> $customer->phone</td>";
            echo " <td> $customer->address</td>";
            echo " <td> $customer->customer_uuid</td>";
            echo "</tr>";
        }
        
   
?>

    </tbody>
</table>

