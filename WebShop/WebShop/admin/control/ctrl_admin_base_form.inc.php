<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctrl_admin_base_form
 *
 * @author markus
 */
class AdminBaseFormController {
    //put your code here
    
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
