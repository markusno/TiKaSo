<?php

require_once 'lib/base.inc.php';
require_once 'control/ctrl_start_customer_session.inc.php';

class PageController {

    private $messages;

    public function __construct() {
        $this->messages = array();
        if (empty($_POST)) {
            return;
        }
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        if (!$this->validate($user_name, $password)) {
            return;
        }
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $account_dao = new User_accountDAO($connection);
        if ($account_dao->validateCustomerAccount($user_name, $password)) {
            $customer_dao = new CustomerDAO($connection);
            $customer = $customer_dao->getCustomer($user_name);
            $_SESSION["customer"]=$customer;
            header('Location: welcome.php');
            exit;
        } else {
            $this->messages[] = ACCOUNT_NOT_FOUND;
        }
    }

    public function getMessages() {
        if (empty($this->messages)) {
            return "";
        }
        $message = "";
        foreach ($this->messages as $messageLine) {
            $message = $message . $messageLine . "<br>";
        }
        return $message;
    }

    private function validate($user_name, $password) {
        $eval = new Evaluation();
        $valid = TRUE;
        if (!$eval->checkUsername($user_name)) {
            $this->messages[] = USER_NAME_INVALID;
            $valid = FALSE;
        }
        if (!$eval->checkPassword($password)) {
            $this->messages[] = PASSWORD_INVALID;
            $valid = FALSE;
        }
        return $valid;
    }

}
?>

