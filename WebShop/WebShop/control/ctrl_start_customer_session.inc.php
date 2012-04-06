<?php
session_start();
if (!isset($_SESSION['customer'])){
    $_SESSION['customer'] = new Customer();
}
if (!isset($_SESSION['shoppin_cart'])){
    $_SESSION['shopping_cart'] = new Shopping_cart;
}
$header;
if ($_SESSION['customer']->getID() == 0){
    $header = 'parts/header_not_logged.php';
} else {
    $header = 'parts/header_logged.php';
    $customer_name = $_SESSION['customer']->getName();
}
$shopping_cart = $_SESSION['shopping_cart'];
?>
