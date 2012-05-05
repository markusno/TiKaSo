<?php
/**
 * Class for creating database connection.
 *
 * @author markus
 */
class DBConnection {
    
    /**
     *Returns PDO object.
     * @return \PDO 
     */
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
