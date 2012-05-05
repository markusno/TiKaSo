<?php
/**
 * Class to hold information about shoppings.
 *
 * @author markus
 */
class Shopping_cart {

    //put your code here
    private $shoppings;

    public function __construct() {
        $this->shoppings = array();
    }

    public function addToCart($product_id, $amount) {
        if (isset($this->shoppings[$product_id])) {
            $amountBefore = $this->shoppings[$product_id];
            $this->shoppings[$product_id] = $amountBefore + $amount;
        } else {
            $this->shoppings[$product_id] = $amount;
        }
    }

    public function increaseAmount($product_id) {
        $this->shoppings[$product_id] = $this->shoppings[$product_id] + 1;
    }

    public function decreaseAmount($product_id) {
        $this->shoppings[$product_id] = $this->shoppings[$product_id] - 1;
        if ($this->shoppings[$product_id] < 1) {
            unset($this->shoppings[$product_id]);
        }
    }

    public function removeProduct($product_id) {
        unset($this->shoppings[$product_id]);
    }

    public function setAmount($product_id, $amount) {
        $this->shoppings[$product_id] = $amount;
    }

    public function getShoppings() {
        return $this->shoppings;
    }

    public function getNumberOfProducts() {
        return count($this->shoppings);
    }

}

?>
