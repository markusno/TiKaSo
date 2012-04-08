<?php

require_once 'lib/base.inc.php';
require_once 'control/ctrl_start_customer_session.inc.php';

class PageController {

    private $messages;

    public function __construct() {
        $this->messages = array();
        if (empty($_POST)) {
            //$form_values = array();
            return;
        }
        $form_values = $_POST;
        if (!$this->validate($form_values)) {
            return;
        }
        if ($this->registerCustomer($form_values)) {
            header('Location: welcome.php');
            exit;
        } else {
            $this->messages[] = ACCOUNT_CREATION_PROBLEM;
        }
    }

    private function registerCustomer($form_values) {
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $account_dao = new User_accountDAO($connection);
        if (!$account_dao->checkUsernameAvailability($form_values["user_name"])) {
            $this->messages[] = USER_NAME_NOT_FREE;
            return FALSE;
        }
        $account_dao->createAccount($form_values["user_name"], 
                $form_values["password"], "customer");
        $customer_dao = new CustomerDAO($connection);
        $customer = $customer_dao->registerCustomer($form_values);
        if ($customer->getID() != 0) {
            $_SESSION["customer"] = $customer;
            return TRUE;
        }
        return FALSE;
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

    private function validate(&$form_values) {
        $eval = new Evaluation();
        $valid = TRUE;
        if (!$eval->checkUsername($form_values["user_name"])) {
            $this->messages[] = USER_NAME_INVALID;
            $valid = FALSE;
        }
        if (!$eval->checkPassword($form_values["password"])) {
            $this->messages[] = PASSWORD_INVALID;
            $valid = FALSE;
        } else if ($form_values["password"] != $form_values["password_confirmation"]) {
            $this->messages[] = PASSWORD_CONFIRMATION_FAIL;
            $valid = FALSE;
        }

        if (!$eval->checkNoEmptyValues($form_values)) {
            $this->messages[] = EMPTY_FIELDS;
            $valid = FALSE;
        }
        return $valid;
    }

}

?>