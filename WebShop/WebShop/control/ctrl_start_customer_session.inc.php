<?php
/**
 * Starts customers shopping sessions.
 * If there's no customer saved in sesson table, creates new customer object and saves that.
 * If there's no shopping cart saved in sesson table, creates new shopping cart object and saves that.
 */
session_start();
if (!isset($_SESSION['customer'])){
    $_SESSION['customer'] = new Customer();
}
if (!isset($_SESSION['shopping_cart'])){
    $_SESSION['shopping_cart'] = new Shopping_cart();
}
?>
