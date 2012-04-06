<?php
require_once 'lib/base.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo 'testi';
        $user_name = "kayttaja";
        $password = "salasana";
        $dbObject = new DBConnection();
        var_dump($dbObject);
        $connection = $dbObject->getConnetion();
        var_dump($connection);
        $account_dao = new User_accountDAO($connection);
        var_dump($account_dao);
        $query = $connection->prepare("SELECT * FROM Customer WHERE user_name=?");
        $query->execute(array($user_name));
        $customerLine = $query->fetch();
        echo $customerLine["user_name"];
        if ($account_dao->validateCustomerAccount($user_name, $password)) {
            echo "tili löyty";
            $customer_dao = new CustomerDAO($connection);
            var_dump($customer_dao);
            $query = $connection->prepare("SELECT * FROM Customer
            WHERE user_name=? and password=?");
            $query->execute(array($user_name, $password));
            $customerLine = $query->fetch();
            echo $customerLine["last_name"];
//            $customer = $customer_dao->getCustomer($user_name, $password);
//            var_dump($customer);
//            $_SESSION["customer"]=$customer;
//            var_dump($_SESSION);
//            header('Location: customer_info.php');
//            exit;
        } else {
            $this->messages[] = ACCOUNT_NOT_FOUND;
        }
        ?>
    </body>
</html>
