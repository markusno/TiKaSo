<?php
/**
 *Index and login page controller for admin pages. 
 */
require_once 'lib/admin_base.inc.php';
require_once 'control/ctrl_start_admin_session.inc.php';

class PageController{
    
    private $messages;
    
    /**
     *If login is succesfull this constructor saves admin object in session table.
     *If there's problems with login concurrent errormessage is adde to error message table. 
     * @return type 
     */
    public function __construct() {
        if (isset($_SESSION["admin"])){
            header("location: settings.php");
        }
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
        if ($account_dao->validateAdminAccount($user_name, $password)) {
            $last_login = $account_dao->getLastLogin($user_name);
            $admin_dao = new Shop_adminDAO($connection);
            $admin = $admin_dao->getAdmin($user_name, $last_login);
            $_SESSION["admin"]=$admin;
            $account_dao->setLastLogin($user_name);
            header('Location: settings.php');
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
    
    /**
     *Getter for error messages.
     * @return error messages as string. 
     */
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
}
?>
