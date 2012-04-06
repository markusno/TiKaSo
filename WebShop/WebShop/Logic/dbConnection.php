<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbConnection
 *
 * @author markus
 */
class dbConnection {

    //put your code here
    private $connection;
    public function __construct() {
        
    }
    
    public function checkUsername($user_name){
        $this->openConnection();
        $query = $this->connection->prepare("SELECT user_name FROM user_account");
        $query->execute();
        $freeName = TRUE;
        while ($row = $query->fetch()) {
            if ($row["user_name"] == $user_name){
                $freeName = FALSE;
            }
        }
        $this->closeConnection();
        return $freeName;
    }
    
    private function openConnection(){
        try {
            $this->connection = new PDO("pgsql:host=localhost;dbname=markusno",
                            "markusno", "bb6a769a27189f9b");
        } catch (PDOException $e) {
            echo 'Ei yhteyttä';
            die("VIRHE: " . $e->getMessage());
        }
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    private function closeConnection(){
        $this->connection = null;
    }
    
    private function createAccount($username, $password, $accountType) {
        $query = $this->connection->prepare("INSERT INTO User_account 
            (user_name, password, account_type) VALUES (?, ?, ?)");
        $query->execute(array($username, $password, $accountType));
    }

    public function registerCustomer($registerInfo) {
        $this->openConnection();
        $this->createAccount($registerInfo["user_name"], 
                $registerInfo["password"], "customer");
        $query = $this->connection->prepare("INSERT INTO Customer 
            (last_name, first_name, street_address, postal_code, city, email,
            phone_number, user_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute(array($registerInfo["last_name"], $registerInfo["first_name"],
            $registerInfo["street_address"], $registerInfo["postal_code"],
            $registerInfo["city"], $registerInfo["email"],
            $registerInfo["phone_number"], $registerInfo["user_name"]));
        $this->closeConnection();
    }
}
?>
