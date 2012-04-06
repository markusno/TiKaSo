<?php
require_once 'control/ctrl_register.inc.php';
$controll = new PageController();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once $header;
        require_once 'parts/site_navi.php';
        ;
        ?>
        <div id="error_message">
            <?php
            echo $controll->getMessages();
            ?>
        </div>
        <div id ="register">
            <form action="<?php echo htmlspecialchars($PHP_SELF) ?>;" method="post">
                <?php
                echo
                'Sukunimi: <input type="text" name="last_name" value ="' . $registerInfo["last_name"] . '"> <br>
        Etunimi: <input type="text" name="first_name" value ="' . $registerInfo["first_name"] . '"> <br>
        Katuosoite: <input type="text" name="street_address" value ="' . $registerInfo["street_address"] . '"> <br>
        Postinumero: <input type="text" name="postal_code" value ="' . $registerInfo["postal_code"] . '"> <br>
        Postitoimipaikka: <input type="text" name="city" value ="' . $registerInfo["city"] . '"> <br>
        Sähköpostiosoite: <input type="text" name="email" value ="' . $registerInfo["email"] . '"> <br>
        Puhelinnumero: <input type="text" name="phone_number" value ="' . $registerInfo["phone_number"] . '"> <br>
        Käyttäjänimi: <input type="text" name="user_name" value ="' . $registerInfo["user_name"] . '"> <br>
        Salasana: <input type="password" name="password" value ="' . $registerInfo["password"] . '"> <br>
        <input type="submit" value="Rekisteröidy">'
                ?>
            </form>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
