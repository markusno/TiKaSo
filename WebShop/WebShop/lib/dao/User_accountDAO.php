<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_accountDAO
 *
 * @author markus
 */
class User_accountDAO {
    
    private $connection;
    
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    public function checkUsernameAvailability($user_name){
        $query = $this->connection->prepare("SELECT user_name FROM user_account");
        $query->execute();
        while($row = $query->fetch()){
            if ($row["user_name"] == $user_name){
                return FALSE;
            }
        }
        return TRUE;
    }
    
    public function createAccount($user_name, $password, $account_type){
        $query = $this->connection->prepare("INSERT INTO User_account (user_name,
            password, account_type) VALUES (?, ?, ?)");
        $query->execute(array($user_name, $password, $account_type));
    }
    
    public function validateCustomerAccount($user_name, $password){
        $query = $this->connection->prepare("SELECT account_type 
            FROM user_account WHERE user_name=? and password=?;");
        $query->execute(array($user_name, $password));
        $row = $query->fetch();
        if (empty($row) OR $row["account_type"] != "customer"){
            return FALSE;
        }
        return TRUE;
    }
    
    public function getLastLogin ($user_name){
        $query = $this->connection->prepare("SELECT last_login 
            FROM user_account WHERE user_name=?;");
        $query->execute(array($user_name));
        $row = $query->fetch();
        return $row["last_login"];
    }
    
    public function setLastLogin ($user_name){
        $query = $this->connection->prepare("UPDATE user_account 
            SET last_login = DEFAULT
            WHERE user_name = ?;");
        $query->execute(array($user_name));
    }
    
    public function validateAdminAccount($user_name, $password){
        $query = $this->connection->prepare("SELECT account_type 
            FROM user_account WHERE user_name=? and password=?;");
        $query->execute(array($user_name, $password));
        $row = $query->fetch();
        if (empty($row) OR $row["account_type"] != "admin"){
            return FALSE;
        }
        return TRUE;
    }
}
?>
