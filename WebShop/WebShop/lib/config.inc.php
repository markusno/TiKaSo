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
define("INVALID_USER_NAME", "Virheellinen käyttäjänimi!");
define("INVALID_PASSWORD", "Virheellinen salasana!");
define("EMPTY_FIELDS", "Kaikki kentät pakollisia");
define("ACCOUNT_NOT_FOUND", "Käyttäjätiliä ei löydy tarkasta käyttäjänimi ja salasana");
?>
