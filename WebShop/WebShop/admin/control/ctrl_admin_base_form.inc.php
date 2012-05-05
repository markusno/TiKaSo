<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Common operations for all forms in admin pages.
 *
 * @author markus
 */
class AdminBaseFormController {
    //put your code here
    
    protected $messages;
    
    public function __construct() {
        $this->messages = array();
    }
    
    /**
     *Getter for error messages.
     * @return error messages as string. 
     */
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
