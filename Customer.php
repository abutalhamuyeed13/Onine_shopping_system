<?php
class Customer {
    public $id;
    public $name;
    public $phone;
    public $address;
    public $customer_uuid;

    public function __construct($id, $name,$phone, $address, $customer_uuid) {
        $this->id = $id;
        $this->name = $name;
        $this->phone=$phone;
        $this->address = $address;
        $this->customer_uuid=$customer_uuid;
    }
}
?>
