<?php

require_once 'lib/config.inc.php';

//Database and evaluation
require_once 'lib/common/DBConnection.php';
require_once 'lib/common/Evaluation.php';
//Models
require_once 'lib/model/Customer.php';
require_once 'lib/model/Customer_order.php';
require_once 'lib/model/Product.php';
require_once 'lib/model/Product_group.php';
require_once 'lib/model/Product_in_cart.php';
require_once 'lib/model/Shopping_cart.php';
//Data access
require_once 'lib/dao/User_accountDAO.php';
require_once 'lib/dao/CustomerDAO.php';
require_once 'lib/dao/Customer_orderDAO.php';
require_once 'lib/dao/ProductDAO.php';
require_once 'lib/dao/Product_groupDAO.php';
//Logic
require_once 'lib/logic/Email_logic.php';
?>

