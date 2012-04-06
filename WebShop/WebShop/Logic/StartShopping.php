<?php
require_once 'ShoppingSession.php';
session_start();
if (!isset($_SESSION["shopping_session"])) {
    $shopping_session = new ShoppingSession();
    $_SESSION["shopping_session"] = $shopping_session;
}
if (!isset($_SESSION["test"])) {
    $_SESSION["test"] = rand(0, 100);
}
?>
