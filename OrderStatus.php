<?php
class OrderStatus {
    public $si;
    public $items;
    public $unit;
    public $price;
    public $order_no;
    public $status;
    
    // Constructor to initialize properties
    public function __construct(
        $si,
        $items,
        $unit,
        $price,
        $order_no,
        $status
    ) {
        $this->si = $si;
        $this->items = $items;
        $this->customer_id = $customer_id;
        $this->unit = $unit;
        $this->price = $price;
        $this->order_no = $order_no;
        $this->status = $status;
    }

    // public function __toString() {
    //     return "Order ID: {$this->id}, Product ID: {$this->product_id}, Customer ID: {$this->customer_id}, Unit: {$this->unit}, Unit Price: {$this->unit_price}, Total Price: {$this->total_price}, Order No: {$this->order_no}, Status: {$this->status}, Vehicle Name: {$this->vehicle_name}, Rider Name: {$this->rider_name}";
    // }
}
?>
