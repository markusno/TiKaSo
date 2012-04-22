<?php
require_once 'control/ctrl_register.inc.php';
$controll = new PageController();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/web_shop_style.css" />
        <title></title>
    </head>
    <body>
        <?php
        require_once 'parts/header.php';
        require_once 'parts/site_navi.php';
        ;
        ?>
        <div class="content_container">
        <div class="content">
        <p class="error_message">
            <?php
            echo $controll->getMessages();
            ?>
        </p>
        <div id ="register_form">
            <form action="<?php echo htmlspecialchars($PHP_SELF); ?>" method="post">
                Sukunimi: <input type="text" name="last_name" value ="<?php
                echo htmlspecialchars($form_values["last_name"]); ?>"> <br>
                Etunimi: <input type="text" name="first_name" value ="<?php
                echo htmlspecialchars($form_values["first_name"]); ?>"> <br>
                Katuosoite: <input type="text" name="street_address" value ="<?php
                echo htmlspecialchars($form_values["street_address"]); ?>"> <br>
                Postinumero: <input type="text" name="postal_code" value ="<?php
                echo htmlspecialchars($form_values["postal_code"]); ?>"> <br>
                Postitoimipaikka: <input type="text" name="city" value ="<?php
                echo htmlspecialchars($form_values["city"]); ?>"> <br>
                Sähköpostiosoite: <input type="text" name="email" value ="<?php
                echo htmlspecialchars($form_values["email"]); ?>"> <br>
                Puhelinnumero: <input type="text" name="phone_number" value ="<?php
                echo htmlspecialchars($form_values["phone_number"]); ?>"> <br>
                Käyttäjänimi: <input type="text" name="user_name" value ="<?php
                echo htmlspecialchars($form_values["user_name"]); ?>"> <br>
                Salasana: <input type="password" name="password" value =""> <br>
                Salasanan varmistus: <input type="password" name="password_confirmation" value =""> <br>
                <input type="submit" name="register" value="Rekisteröidy">
            </form>
        </div>
        </div>
        </div>
<?php
include_once 'parts/footer.php';
?>
    </body>
</html>
