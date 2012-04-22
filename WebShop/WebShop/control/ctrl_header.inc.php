<?php
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
    
    public function getCustomerName(){
        if (isset($this->customer)){
            return $this->customer->getName();
        }
    }
    
    public function getLoginBlock() {
        if ($this->customer->getID() != 0){
            return 'parts/logout_block.php';
        }
        return 'parts/login_block.php';
    }
}
?>
