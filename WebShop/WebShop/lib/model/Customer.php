<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author markus
 */
class Customer {
    //put your code here
    private $customer_id;
    private $last_name;
    private $first_name;
    private $street_address;
    private $postal_code;
    private $city;
    private $email;
    private $phone_number;
    private $user_name;
    
    public function __construct() {
        $this->customer_id = 0;
    }

    public function getID(){
        return $this->customer_id;
    }
    
    public function getName(){
        return $this->first_name." ".$this->last_name;
    }
    
    public function setCustomer($customer_info){
        $this->customer_id = $customer_info["customer_id"];
        $this->last_name = $customer_info["last_name"];
        $this->first_name = $customer_info["first_name"];
        $this->street_address = $customer_info["street_address"];
        $this->postal_code = $customer_info["postal_code"];
        $this->city = $customer_info["city"];
        $this->email = $customer_info["email"];
        $this->phone_number = $customer_info["phone_number"];
        $this->user_name = $customer_info["user_name"];
    }
}

?>
