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
define("USER_NAME_INVALID", "Invalid username!");
define("PASSWORD_INVALID", "Invalid password!");
define("EMPTY_FIELDS", "All fields required!");
define("NAME_EMPTY", "Name required!");
define("ACCOUNT_NOT_FOUND", "Can't find user account!");
define("PASSWORD_CONFIRMATION_FAIL", "Check password!");
define("USER_NAME_NOT_FREE", "Username already taken!");
define("ACCOUNT_CREATION_PROBLEM", "Problems creating account!");
define("EMAIL_INVALID", "Invalid email!");
define("PRICE_NOT_NUMERIC", "Only numbers for price with comma as decimal separator!");
define("PRICE_NEGATIVE", "Price can't be negative!");
define("PRODUCT_SAVED_SUCCESFULLY", "Product saved succesfully!");
define("PRODUCT_CREATED_SUCCESFULLY", "New product created succesfully!");
define("PRODUCT_NOT_SELECTED", "You need to select existing product in order to save changes!");
?>



