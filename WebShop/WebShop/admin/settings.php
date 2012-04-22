<?php
require_once 'control/ctrl_admin_settings.inc.php';
$control = new PageController();
//var_dump($_POST["unit_price"]);
//var_dump($_POST["group_for_product"]);
//var_dump($_POST["name"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="admin_header">
            <div id="admin_log">
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                      method="post">
                    <?php echo $control->getAdminName()." Last login: ".
                        $control->getAdminLastLogin();?>
                    <input type="submit" name="logout" value="Logout"/>
                </form>
            </div>
            <div id="admin_navi">
                <h2>Settings</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                      method="post">
                    <input type="submit" name="navi" value="Product settings"/>
                </form>
            </div>
            <div id="admin_content">
                <?php include_once $control->getContent(); ?>
            </div>    
        </div>
    </body>
</html>
