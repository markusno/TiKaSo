<?php

/**
 * Class for product information.
 *
 * @author markus
 */
class Product {

    //put your code here
    private $product_id;
    private $name;
    private $description;
    private $unit_price;
    private $visibility;

    public function __construct(&$product_info) {
        $trimmer = new Trimmer();
        $this->product_id=$product_info["product_id"];
        $this->name=$product_info["name"];
        $this->description=$product_info["description"];
        $this->unit_price=$trimmer->moneyToDecimal($product_info["unit_price"]);
        $this->visibility=$product_info["visibility"];
    }
    
    public function getID(){
        return $this->product_id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function getPrice(){
        return $this->unit_price;
    }
    
    public function getVisibility(){
        return $this->visibility;
    }

}

?>
