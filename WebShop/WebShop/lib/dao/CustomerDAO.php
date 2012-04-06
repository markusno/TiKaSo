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
        $customerLine = $query->fetch();
        $customer = new Customer();
        $customer->setCustomer($customerLine);
        return $customer;
    }

}

?>
