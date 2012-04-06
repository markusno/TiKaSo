<?php
session_start();
if (!isset($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = new Shopping_cart();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>WebShop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id ="header">
            <?php
            if (isset($_SESSION["customer"])) {
                echo '<a href = "customer.php> customer->getName()<a>';
            } else
                echo '<a href = "login.php">Kirjaudu sisään</a> || <a href = "register.php">Rekisteröidy</a>'
                ?>
        </div>

