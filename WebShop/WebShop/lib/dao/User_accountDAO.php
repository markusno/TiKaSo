<?php
/**
 * Class for accessing user account information in database.
 *
 * @author markus
 */
class User_accountDAO {
    
    private $connection;
    
    /**
     *Assigns PDO object given as parameter to be used by functions.
     * @param PDO $connection 
     */
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    /**
     *Checks from database if username is free.
     * @param string $user_name
     * @return boolean
     */
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
    
    /**
     *Inserts new row into useraccount table in database.
     * @param string $user_name
     * @param string $password
     * @param string $account_type 
     */
    public function createAccount($user_name, $password, $account_type){
        $query = $this->connection->prepare("INSERT INTO User_account (user_name,
            password, account_type) VALUES (?, ?, ?)");
        $query->execute(array($user_name, $password, $account_type));
    }
    
    /**
     *Checks if theres user account which account type is customer in database with given username password.
     * @param string $user_name
     * @param string $password
     * @return boolean 
     */
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
    
    /**
     *Gets information of last login by username from database.
     * @param string $user_name
     * @return string
     */
    public function getLastLogin ($user_name){
        $query = $this->connection->prepare("SELECT last_login 
            FROM user_account WHERE user_name=?;");
        $query->execute(array($user_name));
        $row = $query->fetch();
        return $row["last_login"];
    }
    
    /**
     *Updates default (current time) as last login value for user account.
     * @param string $user_name 
     */
    public function setLastLogin ($user_name){
        $query = $this->connection->prepare("UPDATE user_account 
            SET last_login = DEFAULT
            WHERE user_name = ?;");
        $query->execute(array($user_name));
    }
    
    /**
     *Checks if theres user account which account type is admin in database with given username password.
     * @param string $user_name
     * @param string $password
     * @return boolean 
     */
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
