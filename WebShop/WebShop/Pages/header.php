<?php
require_once '../Logic/StartShopping.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Shop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id ="header">
            <?php
            $customerName = "not_logged";
            if ($customerName != "not_logged") {
                echo '<a href = "customer.php?session=$shopping_session">' . $customerName . '</a>';
            } else {
                echo '<a href = "/WebShop/Pages/login.php">Kirjaudu sisään</a> 
                    || <a href = "/WebShop/Pages/register.php">Rekisteröidy</a>';
            }
            ?>
        </div>

