<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_group
 *
 * @author markus
 */
class Product_group {
    //put your code here
    private $product_group_id;
    private $group_name;
    private $group_description;
    
    public function __construct($product_group_info) {
        $this->product_group_id = $product_group_info["product_group_id"];
        $this->group_name = $product_group_info["group_name"];
        $this->group_description = $product_group_info["group_description"];
    }
    
    public function setGroup($product_group_info){
        $this->product_group_id = $product_group_info["product_group_id"];
        $this->group_name = $product_group_info["group_name"];
        $this->group_description = $product_group_info["group_description"];
        
    }
    
    public function getID() {
        return $this->product_group_id;
    }
    
    public function getName(){
        return $this->group_name;
    }
    
    public function getDescription(){
        return $this->group_description;
    }
}

?>
