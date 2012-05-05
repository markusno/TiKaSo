<?php

/**
 *Controller for customer pages header. 
 */
class HeaderController{
    
    private $customer;
    
    public function __construct() {
        if (isset($_POST["logout"])){
            $_SESSION["customer"] = new Customer();
        }
        if (isset($_SESSION["customer"])){
            $this->customer = $_SESSION["customer"];
        }
    }
    
    /**
     *Returns the name of currently logged in customer.
     * @return name as string.
     */
    public function getCustomerName(){
        if (isset($this->customer)){
            return $this->customer->getName();
        }
    }
    
    /**
     *Getter for login / logout blocks adress.
     * If customer is logged returns adress to logout block.
     * Othervise returns adress to login block.
     * @return adress as string 
     */
    public function getLoginBlock() {
        if ($this->customer->getID() != 0){
            return 'parts/logout_block.php';
        }
        return 'parts/login_block.php';
    }
}
?>
