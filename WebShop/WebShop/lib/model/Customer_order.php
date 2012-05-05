<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer_order
 *
 * @author markus
 */
class Customer_order {

    private $order_id;
    private $customer_id;
    private $order_paid;
    private $planned_fetch;
    private $planned_delivery;
    private $fetched;
    private $delivered;

    public function __construct($order_info) {
        $this->order_id = $order_info["order_id"];
        $this->customer_id = $order_info["customer_id"];
        $this->order_paid = $order_info["order_paid"];
        $this->planned_fetch = $order_info["planned_fetch"];
        $this->planned_delivery = $order_info["planned_delivery"];
        $this->fetched = $order_info["fetched"];
        $this->delivered = $order_info["delivered"];
    }
    
    public function getOrderID(){
        return $this->order_id;
    }
    
    public function getCustomerID(){
        return $this->customer_id;
    }
    
    public function getOrderPaid(){
        return $this->order_paid;
    }
    
    public function getPlannedFetch(){
        return $this->planned_fetch;
    }
    
    public function getPlannedDelivery(){
        return $this->planned_delivery;
    }
    
    public function getFetched(){
        return $this->fetched;
    }
    
    public function getDelivered(){
        return $this->delivered;
    }

}

?>
