<?php
require_once 'dbConnection.php';
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShoppingSession
 *
 * @author markus
 */


class ShoppingSession {
    
    private $dbConnection;
    
    public function __construct() {
        $this->dbConnection = new dbConnection();
    }
    
    public function getCustomerName(){
        return 'not_logged';
    }
    
    public function checkUsername($user_name){
        return $this->dbConnection->checkUsername($user_name);
    }


    public function registerCustomer($registerInfo){
        
    }
    
    public function usernameFree($username){
        return true;
    }
}

?>
