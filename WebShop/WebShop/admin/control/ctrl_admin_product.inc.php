<?php
require_once 'control/ctrl_admin_base_form.inc.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctrl_admin_product
 *
 * @author markus
 */
class ProductFormController extends AdminBaseFormController {

    //put your code here
    private $product_group_dao;
    private $product_dao;
    private $product_group;
    private $product;

    public function __construct() {
        parent::__construct();
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $this->product_group_dao = new Product_groupDAO($connection);
        $this->product_dao = new ProductDAO($connection);
        
        if(isset($_POST["create"])){
            $this->createNewProduct();
        }
        
        if(isset($_POST["save"])){
            $this->saveProduct();
        }
        
        if (isset($_POST["product"])) {
            $_SESSION["product"] = $_POST["product"];
        }
        if (isset($_POST["product_group"])) {
            $_SESSION["product_group"] = $_POST["product_group"];
        }
        if (isset($_SESSION["product"])) {
            $this->setProduct($_SESSION["product"]);
        }
        if (isset($_SESSION["product_group"])) {
            $this->setProductGroup($_SESSION["product_group"]);
        }
    }
    
    private function buildProductInfo(){
        $productInfo = Array();
        $productInfo["name"] = $_POST["name"];
        $productInfo["description"] = $_POST["description"];
        $productInfo["unit_price"] = $_POST["unit_price"];
        $productInfo["visibility"] = $_POST["visibility"];
        return $productInfo;
    }
    
    private function saveProduct(){
        if (!isset($_POST["product"]) || $_POST["product"] == "new"){
            $this->messages[] = PRODUCT_NOT_SELECTED;
            return;
        }
        $productInfo = $this->buildProductInfo();
        if (!$this->validateForm($productInfo)){
            return;
        }
        $productInfo["product_id"] =  $_POST["product"];
        $trimmer = new Trimmer();
        $productInfo["unit_price"] = $trimmer->moneyToDecimal($productInfo["unit_price"]);
        $this->product = 
        $this->product_dao->saveExistingProduct($productInfo, $_POST["group_for_product"]);
        if (!empty($this->product)){
            $this->messages[] = PRODUCT_SAVED_SUCCESFULLY;
        }
    }
    
    private function createNewProduct(){
        $productInfo = $this->buildProductInfo();
        if (!$this->validateForm($productInfo)){
            return;
        }
        $trimmer = new Trimmer();
        $productInfo["unit_price"] = $trimmer->moneyToDecimal($productInfo["unit_price"]);
        $this->product = 
        $this->product_dao->saveNewProduct($productInfo, $_POST["group_for_product"]);
        if (!empty($this->product)){
            $this->messages[] = PRODUCT_CREATED_SUCCESFULLY;
        }
    }
    
    private function validateForm(&$productInfo){
        $eval = new Evaluation();
        $form_valid = true;
        
        if($eval->checkEmptyValue($productInfo["name"])){
            $this->messages[] = NAME_EMPTY;
            $form_valid = FALSE;
        }
        
        if (!$eval->checkMonetaryValue($productInfo["unit_price"])){
            $this->messages[] = PRICE_NOT_NUMERIC;
            $form_valid = FALSE;
        }
        
        return $form_valid;
        
    }

    private function setProduct($id) {
        if ($id == null || $id == "new") {
            return;
        }
        if ($_SESSION["product_group"] != "all" && 
                !in_array($_SESSION["product_group"],
                        $this->product_group_dao->
                        getProductGroupIdListForProduct($_SESSION["product"]))) {
            $_SESSION["product"] = "new";
            return;
        }
        $this->product = $this->product_dao->getProduct($id);
    }

    private function setProductGroup($id) {
        if ($id == null || $id == "all") {
            return;
        }
        $this->product_group = $this->product_group_dao->getProductGroup($id);
    }

    public function getProductGroupOptions() {
        $productGroups = $this->product_group_dao->getProductGroupList();
        $groupOptions = "";
        $currentGroupID = 0;
        if (isset($this->product_group)) {
            $currentGroupID = $this->product_group->getID();
        }
        foreach ($productGroups as $group) {
            $groupOptions = $groupOptions . "<option value=\"" . $group->getID() . "\"";
            if ($group->getID() == $currentGroupID) {
                $groupOptions = $groupOptions . "selected=\"selected\"";
            }
            $groupOptions = $groupOptions . ">" . $group->getName() . "</option>";
        }
        return $groupOptions;
    }

    public function getProductOptions() {
        if (isset($this->product_group)) {
            $products = $this->product_dao->getProductsInGroup($this->product_group->getID());
        } else {
            $products = $this->product_dao->getAllProducts();
        }
        $currentProductId = 0;
        if (isset($this->product)) {
            $currentProductId = $this->product->getID();
        }
        $productOptions = "";
        foreach ($products as $product) {
            $productOptions = $productOptions . "<option value=\"" . $product->getID() . "\"";
            if ($product->getID() == $currentProductId) {
                $productOptions = $productOptions . "selected=\"selected\"";
            }
            $productOptions = $productOptions . ">" . $product->getName() . "</option>";
        }
        return $productOptions;
    }
    
    public function getProductID() {
        if (isset($this->product)) {
            return $this->product->getID();
        }
        return "";
    }
    
    public function getProductName() {
        if (isset($this->product)) {
            return $this->product->getName();
        }
        return "new product";
    }

    public function getProductDescription() {
        if (isset($this->product)) {
            return $this->product->getDescription();
        }
        return "";
    }

    public function getProductPrice() {
        if (isset($this->product)) {
            return $this->product->getPrice();
        }
        return "";
    }

    public function getProductVisibleChecked() {
        if (isset($this->product)) {
            if (!$this->product->getVisibility()) {
                return "";
            }
        }
        return "checked=\"checked\"";
    }

    public function getProductHiddenChecked() {
        if (isset($this->product)) {
            if (!$this->product->getVisibility()) {
                return "checked=\"checked\"";
            }
        }
        return "";
    }

    public function getProductGroupCheckBoxes() {
        $productGroups = $this->product_group_dao->getProductGroupList();
        $groupIdsForProduct = Array();
        if (isset($this->product)) {
            $groupIdsForProduct =
                    $this->product_group_dao->getProductGroupIdListForProduct($this->product->getID());
        }
        $groupCheckBoxes = "";
        $currentGroupID = 0;
        if (isset($this->product_group)) {
            $currentGroupID = $this->product_group->getID();
        }
        foreach ($productGroups as $group) {
            $groupCheckBoxes = $groupCheckBoxes . "<input type=\"checkbox\"
                name=\"group_for_product[]\" value=\"" . $group->getID() . "\"";
            if ($group->getID() == $currentGroupID || 
                    in_array($group->getID(), $groupIdsForProduct)) {
                $groupCheckBoxes = $groupCheckBoxes . "checked=\"checked\"";
            }
            $groupCheckBoxes = $groupCheckBoxes . ">" . $group->getName();
        }
        return $groupCheckBoxes;
    }

}

?>
