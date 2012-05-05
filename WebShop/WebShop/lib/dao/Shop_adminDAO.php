<?php
/**
 * Class for accessing admin information in database.
 *
 * @author markus
 */
class Shop_adminDAO {
    //put your code here
    private $connection;
    
    /**
     *Assigns PDO object given as parameter to be used by functions.
     * @param PDO $connection 
     */
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    /**
     *Gets admins information from database by username.
     * Returns admin object.
     * @param string $user_name
     * @param string $last_login
     * @return \Admin 
     */
    public function getAdmin($user_name, $last_login) {
        $query = $this->connection->prepare("SELECT * FROM Shop_admin
            WHERE user_name=?");
        $query->execute(array($user_name));
        $admin_info = $query->fetch();
        $admin = new Admin($admin_info, $last_login);
        return $admin;
    }
}

?>
