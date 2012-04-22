<?php

require_once 'lib/admin_base.inc.php';
require_once 'control/ctrl_start_admin_session.inc.php';
require_once 'control/ctrl_admin_product.inc.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctrl_admin_settings
 *
 * @author markus
 */
class PageController {

    private $admin;
    private $messages;
    private $content;

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
    
    public function getContent(){
        return $this->content;
    }

    public function getAdminName (){
        return $this->admin->getName();
    }
    
    public function getAdminLastLogin (){
        return $this->admin->getLastLogin();
    }
}

?>
