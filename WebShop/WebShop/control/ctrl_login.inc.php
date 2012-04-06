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
            header('Location: customer.php');
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
        if (!$eval->checkLength($user_name, USERNAME_MIN_LENGTH, USERNAME_MAX_LENGTH)) {
            $this->messages[] = INVALID_USER_NAME;
            $valid = FALSE;
        }
        if (!$eval->checkLength($password, PASSWORD_MIN_LENGTH, PASSWORD_MAX_LENGTH)) {
            $this->messages[] = INVALID_PASSWORD;
            $valid = FALSE;
        }
        return $valid;
    }

}
?>

