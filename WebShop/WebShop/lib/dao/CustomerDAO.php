<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerDAO
 *
 * @author markus
 */
class CustomerDAO {
    
    private $connection;
    
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    public function getCustomer($user_name) {
        $query = $this->connection->prepare("SELECT * FROM Customer
            WHERE user_name=?");
        $query->execute(array($user_name));
        $customer_info = $query->fetch();
        $customer = new Customer();
        $customer->setCustomer($customer_info);
        return $customer;
    }
    
    public function registerCustomer(&$customer_info) {
        $query = $this->connection->prepare("INSERT INTO Customer 
            (last_name, first_name, street_address, postal_code, city, email,
            phone_number, user_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute(array($customer_info["last_name"], $customer_info["first_name"],
            $customer_info["street_address"], $customer_info["postal_code"],
            $customer_info["city"], $customer_info["email"],
            $customer_info["phone_number"], $customer_info["user_name"]));
        $customer = $this->getCustomer($customer_info["user_name"]);
        return $customer;
    }

}

?>
