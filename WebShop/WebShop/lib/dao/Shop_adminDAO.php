<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shop_adminDAO
 *
 * @author markus
 */
class Shop_adminDAO {
    //put your code here
    private $connection;
    
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    public function getAdmin($user_name, $last_login) {
        $query = $this->connection->prepare("SELECT * FROM Shop_admin
            WHERE user_name=?");
        $query->execute(array($user_name));
        $admin_info = $query->fetch();
        $admin = new Admin($admin_info, $last_login);
        return $admin;
    }
}

?>
