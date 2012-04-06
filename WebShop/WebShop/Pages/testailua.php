<?php
include '../Logic/StartShopping.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            $connection = new PDO("pgsql:host=localhost;dbname=markusno",
                            "markusno", "bb6a769a27189f9b");
        } catch (PDOException $e) {
            die("VIRHE: " . $e->getMessage());
        }
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $connection->prepare("SELECT user_name FROM user_account");
        $query->execute();
        while ($name = $query->fetch()) {
            echo $name["user_name"];
        }
        ?>
    </body>
</html>
