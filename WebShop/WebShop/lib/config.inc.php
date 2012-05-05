<?php
//Database settings
define("DATABASE", "pgsql:host=localhost;dbname=markusno");
define("DBUSER", "markusno");
define("DBPASS", "bb6a769a27189f9b");

define("USERNAME_MIN_LENGTH", 4);
define("USERNAME_MAX_LENGTH", 16);
define("PASSWORD_MIN_LENGTH", 6);
define("PASSWORD_MAX_LENGTH", 16);

//Email
define("ADMINMAIL", "markus.nousiainen@cs.helsinki.fi");

//Form error messages
define("USER_NAME_INVALID", "Virheellinen käyttäjänimi!");
define("PASSWORD_INVALID", "Virheellinen salasana!");
define("EMPTY_FIELDS", "Kaikki kentät pakollisia!");
define("ACCOUNT_NOT_FOUND", "Käyttäjätiliä ei löydy! Tarkasta käyttäjänimi ja salasana!");
define("PASSWORD_CONFIRMATION_FAIL", "Tarkista salasana!");
define("USER_NAME_NOT_FREE", "Käyttäjänimi varattu!");
define("ACCOUNT_CREATION_PROBLEM", "Ongelmia käyttäjätilin luonnissa!");
define("EMAIL_INVALID", "Virheellinen sähköpostiosoite");
define("PRODUCT_ADDED", "Tuote lisätty ostoskoriin");
define("SHOPPING_CART_EMPTY", "Ostoskorissasi ei ole yhtään tuotetta!");
define("NOT_LOGGED", "Kirjaudu sisään tai rekisteröidy tilataksesi!");
define("ORDER_NOT_SAVED", "Ongelmia tilauksen tallennuksessa!");
define("NO_ORDERS", "Asikastiedoissasi ei ole yhtään tilauksia");
define("ORDER_NOT_PAID", "Odottaa maksua");
define("ORDER_PAID", "Maksu suoritettu");
define("DATE_NOT_DEFINED", "Ei vielä tiedossa");
define("NO_ORDER_SELECTED", "Ei tilausta valittuna.");
?>



