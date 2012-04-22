<?php
require_once 'control/ctrl_header.inc.php';
$header_controller = new HeaderController();

?>
<div id="header">
    <a href="index.php"><image src="image/static/logo.gif" alt="Webshop" 
                               width="300" height="100"/></a>
    <?php
    include_once  $header_controller->getLoginBlock();
    ?>
</div>