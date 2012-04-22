<?php
require_once 'lib/base.inc.php';
require_once 'control/ctrl_start_customer_session.inc.php';

class BasePageController{
    protected $messages;
    
    public function __construct() {
        $this->messages = array();
    }
    
    public function getMessages() {
        if (empty($this->messages)) {
            return "";
        }
        $message = "";
        foreach ($this->messages as $messageLine) {
            $message = $message . $messageLine . "<br>";
        }
        return $message;
    }
    
}
?>
