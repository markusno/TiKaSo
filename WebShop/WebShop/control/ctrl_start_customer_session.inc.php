<?php
session_start();
if (!isset($_SESSION['customer'])){
    $_SESSION['customer'] = new Customer();
}
if (!isset($_SESSION['shopping_cart'])){
    $_SESSION['shopping_cart'] = new Shopping_cart();
}
?>
