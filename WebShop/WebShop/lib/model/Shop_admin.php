<?php
/**
 * Class for admin information.
 *
 * @author markus
 */
class Admin {
    
    private $name;
    private $user_name;
    private $last_login;
    
    public function __construct(&$admin_info, $last_login) {
        $this->name = $admin_info["name"];
        $this->user_name = $admin_info["user_name"];
        $this->last_login = $last_login;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getUserName(){
        return $this->user_name;
    }
    
    public function getLastLogin(){
        return $this->last_login;
    }
}

?>
