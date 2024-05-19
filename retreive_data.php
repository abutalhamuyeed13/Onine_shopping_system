<?php
// include '../config/database_connection.php';

function getAllOrders($conn){
    $sql = "SELECT * FROM orders";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Define an empty array to store the objects
    $ordersList = array();
    $orders = $stmt->fetchAll();
    require '../model/Order.php';
    foreach ($orders as $row) {
        
        $order = new Order($row["id"],
                            $row["product_id"], 
                            $row["customer_id"], 
                            $row["unit"], 
                            $row["unit_price"],
                            $row["total_price"], 
                            $row["order_no"], 
                            $row["status"],
                            $row["vehicle_name"],
                            $row["rider_name"]);
        // echo $order;                    
        $ordersList[] = $order; 
        
        
    }       
    // $stmt->closeCursor();
    $conn = null;
    return $ordersList;
         
}

function getProductsById($conn,$id){
    $sql = "SELECT * FROM products where id = :id ";
    $stmt = $conn->prepare($sql);

    // Bind the value to the placeholder
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $product['id'] =  $row["id"];
        $product['name'] = $row["name"];
    }

    $conn = null;
    return $product;
}

function getCustomersById($conn,$id){
    $sql = "SELECT * FROM customers where id = :id ";
    $stmt = $conn->prepare($sql);

    // Bind the value to the placeholder
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    try{
        $stmt->execute();
    }catch(Exception $e){
        echo $e;
    }
   
    $customer = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $customer['id'] =  $row["id"];
        $customer['name'] = $row["name"];
    }

    $conn = null;
    return $customer;
}

function getAllCustomers($conn){
    $sql = "SELECT * FROM customers";
    $stmt = $conn->prepare($sql);

    try{
        $stmt->execute();
    }catch(Exception $e){
        echo $e;
    }
   
    $customer = array();
    $all_customer = $stmt->fetchAll();
    // var_dump($all_customer);
    include_once '../model/Customer.php';
    foreach ($all_customer as $row) {
        $customer_obj = new Customer($row["id"],
                                    $row["name"],
                                    $row["phone"],
                                    $row["address"],
                                    $row["customer_uuid"]);

        $customer[] = $customer_obj;
    }

    $conn = null;
    return $customer;;
}

function getAllOrdersDelivered($conn){
    $status = 'Delivered';
    $sql = "SELECT * FROM orders where status=:status";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['status' => $status]);

    // Define an empty array to store the objects
    $ordersList = array();
    
    try{
        $orders = $stmt->fetchAll();
        
    }catch(Exception $e){
        echo $e;
    }
    
    include_once '../model/Order.php';
    foreach ($orders as $row) {
        
        $order = new Order($row["id"],
                            $row["product_id"], 
                            $row["customer_id"], 
                            $row["unit"], 
                            $row["unit_price"],
                            $row["total_price"], 
                            $row["order_no"], 
                            $row["status"],
                            $row["vehicle_name"],
                            $row["rider_name"]);
        // echo $order;                    
        $ordersList[] = $order; 
        
        
    }       
    // $stmt->closeCursor();
    $conn = null;
    return $ordersList;
}

function getAllVehicles($conn){
    $sql = "SELECT * FROM vehicles";
    $stmt = $conn->prepare($sql);

    try{
        $stmt->execute();
    }catch(Exception $e){
        echo $e;
    }
   
    $vehicle = array();
    $all_vehicle = $stmt->fetchAll();
    // var_dump($all_customer);
    include_once '../model/Vehicle.php';
    foreach ($all_vehicle as $row) {
        $vehicle_obj = new Vehicle($row["id"],
                                    $row["product_name"],
                                    $row["order_no"],
                                    $row["vehicle_name"],
                                    $row["rider_name"]);

        $vehicle[] = $vehicle_obj;
    }

    $conn = null;
    return $vehicle;;
}
    
?>
