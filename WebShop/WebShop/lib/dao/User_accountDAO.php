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
    
    public function validateCustomerAccount($user_name, $password){
        $query = $this->connection->prepare("SELECT account_type 
            FROM user_account WHERE user_name=? and password=?");
        $query->execute(array($user_name, $password));
        $row = $query->fetch();
        if (empty($row) OR $row["account_type"] != "customer"){
            return FALSE;
        }
        return TRUE;
    }
}

?>
