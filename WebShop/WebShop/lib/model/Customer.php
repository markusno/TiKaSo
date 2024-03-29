<?php
/**
 * Class for customer information.
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
    
    public function getUsername() {
        return $this->user_name;
    }

    public function getName(){
        return $this->first_name." ".$this->last_name;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getStreetaddress(){
        return $this->street_address;
    }
    
    public function getPostalcode() {
        return $this->postal_code;
    }
    
    public function getCity() {
        return $this->city;
    }
    
    public function getPhonenumber() {
        return $this->phone_number;
    }

    public function setCustomer($customer_info){
        $this->customer_id = $customer_info["customer_id"];
        $this->last_name = $customer_info["last_name"];
        $this->first_name = $customer_info["first_name"];
        $this->street_address = $customer_info["street_address"];
        $this->postal_code = (string)$customer_info["postal_code"];
        $this->city = $customer_info["city"];
        $this->email = $customer_info["email"];
        $this->phone_number = (string)$customer_info["phone_number"];
        $this->user_name = $customer_info["user_name"];
    }
    
    public function toHTMLString(){
        return
        "ID: ". $this->customer_id ."<br/> " .
        $this->last_name .", " . $this->first_name ."<br/> " .
        $this->street_address ."<br/> " .
        $this->postal_code  .", " . $this->city ."<br/> " .
        $this->email ."<br/> " .
        $this->phone_number;
    }
    
    public function toString(){
        return
        "ID: ". $this->customer_id ."\n" .
        $this->last_name .", " . $this->first_name ."\n" .
        $this->street_address ."\n" .
        $this->postal_code  .", " . $this->city ."\n" .
        $this->email ."\n" .
        $this->phone_number;
    }
}

?>
