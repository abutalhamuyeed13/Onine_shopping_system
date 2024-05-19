<?php

class Vehicle {
    public $id;
    public $productName;
    public $orderNo;
    public $vehicleName;
    public $riderName;

    // Constructor
    public function __construct($id, $productName, $orderNo, $vehicleName, $riderName) {
        $this->id = $id;
        $this->productName = $productName;
        $this->orderNo = $orderNo;
        $this->vehicleName = $vehicleName;
        $this->riderName = $riderName;
    }

}
?>
