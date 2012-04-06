<?php
require_once '../Logic/StartShopping.php';
require_once '../Logic/dbConnection.php';
require_once '../Logic/Evaluate.php';

$evaluate = new Evaluate();
$evaluation_problem = FALSE;
$message = "";
if ($evaluate->checkEmptyValues($_POST)) {
    $message = $message . "Kaikki kentät pakollisia!<br>";
    $evaluation_problem = TRUE;
}
if (!$evaluate->checkEmail($_POST["email"])) {
    $message = $message . "Virheellinen sähköpostiosoite!<br>";
    $evaluation_problem = TRUE;
}

if (!($evaluate->checkNumericValue($_POST["postal_code"])
        && $evaluate->checkLength($_POST["postal_code"], 5, 5))) {
    $message = $message . "Virheellinen postinumero!<br>";
    $evaluation_problem = TRUE;
}

if (!($evaluate->checkLength($_POST["user_name"], 4, 16))) {
    $message = $message . "Käyttäjänimen tulee olla vähintään 4 ja enintään 16 merkkiä pitkä!<br>";
    $evaluation_problem = TRUE;
}

if (!($evaluate->checkLength($_POST["password"], 6, 16))) {
    $message = $message . "Salasanan tulee olla vähintään 4 ja enintään 16 merkkiä pitkä!<br>";
    $evaluation_problem = TRUE;
}

if ($evaluation_problem) {
    $_SESSION["registeration_message"] = $message;
    $_SESSION["registerInfo"] = $_POST;
    header("Location: /WebShop/Pages/register.php");
    die();
} else {
    $connection = new dbConnection();
    if($connection->checkUsername($_POST["user_name"])){
        $connection->registerCustomer($_POST);
        $_SESSION["registeration_message"] = "Rekisteröinti onnistui";
        header("Location: /WebShop/Pages/register.php");
        die();
    } else {
        $_SESSION["registeration_message"] = "Käyttäjänimi varattu!";
        header("Location: /WebShop/Pages/register.php");
        die();
    }
}
?>
