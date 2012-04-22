<?php

class ProductNaviController {
    
    private $product_groups;
    private $group_dao;

    public function __construct() { 
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $this->group_dao = new Product_groupDAO($connection);
        $this->getProductGroups();
        
    }
    
    private function getProductGroups(){              
        $this->product_groups = $this->group_dao->getProductGroupList();
    }
    
    public function getNavigation() {
        $navigation = "";
        foreach ($this->product_groups as $group){
            $navigation = $navigation."<a href = \"product_group_page.php?id=".
                    $group->getID()."\"".">".$group->getName()."</a><br>";
        }
        return $navigation;
    }

}

?>
