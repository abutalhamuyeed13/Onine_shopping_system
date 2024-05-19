<?php
class Order {
    public $id;
    public $product_id;
    public $customer_id;
    public $unit;
    public $unit_price;
    public $total_price;
    public $order_no;
    public $status;
    public $vehicle_name;
    public $rider_name;
    
    // Constructor to initialize properties
    public function __construct($id, $product_id, $customer_id, $unit, $unit_price, $total_price, $order_no, $status, $vehicle_name, $rider_name) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->customer_id = $customer_id;
        $this->unit = $unit;
        $this->unit_price = $unit_price;
        $this->total_price = $total_price;
        $this->order_no = $order_no;
        $this->status = $status;
        $this->vehicle_name = $vehicle_name;
        $this->rider_name = $rider_name;
    }

    function get_order_no() {
        return $this->order_no;
      }

}
?>
