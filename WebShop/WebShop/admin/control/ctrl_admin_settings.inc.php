<?php

require_once 'lib/admin_base.inc.php';
require_once 'control/ctrl_start_admin_session.inc.php';
require_once 'control/ctrl_admin_product.inc.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Page controller for admin settings page.
 * Chooses content to be shown in settings page according to users navigation.
 *
 * @author markus
 */
class PageController {

    private $admin;
    private $messages;
    private $content;

    /**
     *Checks if admin is logged in and reidrects to login page if not.
     * Handles navigation information from post table.
     */
    public function __construct() {
        if (isset($_POST["logout"])) {
            unset($_SESSION["admin"]);
        }
        if (!isset($_SESSION["admin"])) {
            header("location: index.php");
            return;
        }
        $this->admin = $_SESSION["admin"];
        if (isset($_POST["navi"])){
            $_SESSION["navi"] = $_POST["navi"];
        }
        $this->setContent($_SESSION["navi"]);
    }
    
    private function setContent ($navi) {
        if ($navi == "Product settings"){
            $this->content = 'parts/admin_product.php';
        }
    }
    
    /**
     * Getter for contents address.
     * @return address as string.
     */
    public function getContent(){
        return $this->content;
    }

    /**
     * Getter for admins name.
     * @return name as string.
     */
    public function getAdminName (){
        return $this->admin->getName();
    }
    
    /**
     * Getter for admins last login time.
     * @return login date and time as string.
     */
    public function getAdminLastLogin (){
        return $this->admin->getLastLogin();
    }
}

?>
