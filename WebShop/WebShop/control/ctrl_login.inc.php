<?php
require_once 'control/ctrl_base_controller.inc.php';

class PageController extends BasePageController{

    public function __construct() {
        parent::__construct();
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

