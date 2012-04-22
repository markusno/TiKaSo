<div class="login_block">
    <a href="customer.php"><?php echo htmlspecialchars($header_controller->getCustomerName()) ?></a><br>
    <form action="<?php echo htmlspecialchars($PHP_SELF) ?>" method="post">
        <input type="submit" name="logout" value="Kirjaudu ulos"/>
    </form>
</div>