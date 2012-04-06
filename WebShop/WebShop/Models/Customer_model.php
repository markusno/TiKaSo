<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer_model
 *
 * @author markus
 */
class Customer_model {

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
    private $connection;
    
     public function __construct($user_name) {
        if ($user_name != -1) {
            connectDB();
            loadCustomer($user_name);
        }
    }
    
    private function loadCustomer($user_name) {
        $customerQuery = $this->connection->prepare("SELECT customer_id, last_name, first_name, 
            street_address, postal_code, city, email, phone_number 
            FROM Customer
            WHERE user_name = $user_name");
        $customerQuery->execute();
        $customerLine = $kysely->fetch();
        $this->customer_id = $customerLine["customer_id"];
        $this->last_name = $customerLine["last_name"];
        $this->first_name = $customerLine["first_name"];
        $this->street_address = $customerLine["street_address"];
        $this->postal_code = $customerLine["postal_code"];
        $this->city = $customerLine["city"];
        $this->email = $customerLine["email"];
        $this->phone_number = $customerLine["phone_number"];
        $this->user_name = $user_name;
    }
    
    public function saveCustomer() {
        connectDB();
        
    }


    private function connectDB() {
        try {
            $this->connection = new PDO("pgsql:host=localhost;dbname=markusno",
                            "markusno", "bb6a769a27189f9b");
        } catch (PDOException $e) {
            die("VIRHE: " . $e->getMessage());
        }
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}

?>
