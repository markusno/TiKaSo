<div id ="login">
    <form action="<?php echo htmlspecialchars($PHP_SELF) ?>" method="post">
        Käyttäjänimi: <input type="text" name="user_name"> <br>
        Salasana: <input type="password" name="password"> <br>
        <input type="submit" name="login" value="Kirjaudu">
    </form>
</div>
