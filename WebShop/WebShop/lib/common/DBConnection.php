<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnection
 *
 * @author markus
 */
class DBConnection {
    //put your code here
    public function getConnetion(){
        try {
            $connection = new PDO(DATABASE, DBUSER, DBPASS);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}
?>
