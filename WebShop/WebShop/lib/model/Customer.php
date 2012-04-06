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
    
    public function setCustomer($customerLine){
        $this->customer_id = $customerLine["customer_id"];
        $this->last_name = $customerLine["last_name"];
        $this->first_name = $customerLine["first_name"];
        $this->street_address = $customerLine["street_address"];
        $this->postal_code = $customerLine["postal_code"];
        $this->city = $customerLine["city"];
        $this->email = $customerLine["email"];
        $this->phone_number = $customerLine["phone_number"];
        $this->user_name = $customerLine["user_name"];
    }
}

?>
