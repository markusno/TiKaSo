<?php
require_once 'header.php';
require_once 'site-navi.php';
$registerInfo = array("", "", "", "",
    "", "", "");
if (isset($_SESSION["registerInfo"])) {
    $registerInfo = $_SESSION["registerInfo"];
    unset($_SESSION["registerInfo"]);
}
$message = "";
if (isset($_SESSION["registeration_message"])) {
        $message = $_SESSION["registeration_message"];
        unset($_SESSION["registeration_message"]);        
    }
var_dump($_SESSION);
?>

<div id="warning">
    <?php
        echo session_id();
        echo $message;
    ?>
</div>
<div id ="register">
    <form action="/WebShop/Forms/customer_form.php" method="post">
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
require_once 'footer.php';
?>
