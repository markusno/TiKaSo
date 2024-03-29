<?php
/**
 *File in wich all commonly used files are required. 
 */
require_once 'lib/admin_config.inc.php';

//Database and evaluation
require_once '../lib/common/DBConnection.php';
require_once '../lib/common/Evaluation.php';
require_once '../lib/common/Trimmer.php';
//Models
require_once '../lib/model/Shop_admin.php';
require_once '../lib/model/Customer.php';
require_once '../lib/model/Customer_order.php';
require_once '../lib/model/Product.php';
require_once '../lib/model/Product_group.php';
require_once '../lib/model/Shopping_cart.php';
//Data access
require_once '../lib/dao/Shop_adminDAO.php';
require_once '../lib/dao/User_accountDAO.php';
require_once '../lib/dao/CustomerDAO.php';
require_once '../lib/dao/Customer_orderDAO.php';
require_once '../lib/dao/ProductDAO.php';
require_once '../lib/dao/Product_groupDAO.php';
//Logic
require_once '../lib/logic/Email_logic.php';
?>

