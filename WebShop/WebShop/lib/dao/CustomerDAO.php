<?php
/**
 * Class for accessing customer information in database
 *
 * @author markus
 */
class CustomerDAO {
    
    private $connection;
    
    /**
     *Assigns PDO object given as parameter to be used by functions.
     * @param PDO $connection 
     */
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    /**
     *Gets customer information from database by user_name given as parameter and returns customer object created with that information.
     * @param string $user_name
     * @return \Customer 
     */
    public function getCustomer($user_name) {
        $query = $this->connection->prepare("SELECT * FROM Customer
            WHERE user_name=?");
        $query->execute(array($user_name));
        $customer_info = $query->fetch();
        $customer = new Customer();
        $customer->setCustomer($customer_info);
        return $customer;
    }
    
    /**
     *Creates new row into customer table in database using information given as parameter and returns customer object created with that information.
     * @param array $customer_info
     * @return /Customer
     */
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
