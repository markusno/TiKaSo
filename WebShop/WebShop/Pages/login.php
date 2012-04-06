<?php
include 'header.php';
include 'site-navi.php';
?>
<div id ="login">
    <form action="/WebShop/Forms/login_form.php" method="post">
        Käyttäjänimi: <input type="text" name="username"> <br>
        Salasana: <input type="password" name="password"> <br>
    </form>
</div>
<?php
include 'footer.php';
?>
