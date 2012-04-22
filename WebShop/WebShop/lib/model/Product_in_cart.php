<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_in_cart
 *
 * @author markus
 */
class Product_in_cart {
    
    private $product_id;
    private $amount;
    
    public function __construct($product_id, $amount) {
        $this->product_id = $product_id;
        if ($amount < 2){
            $this->amount=1;
            return;
        }
        $this->amount = $amount;
    }
    
    public function getID(){
        return $this->product_id;
    }
    
    public function getAmount(){
        return $this->amount;
    }
    
    public function setAmount($amount){
        $this->amount = $amount;
    }
    
    public function increaseAmount(){
        $this->amount++;
    }
    
    public function decreaseAmount(){
        $this->amount--;
    }
    
}

?>
