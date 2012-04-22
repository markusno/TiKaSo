<?php
require_once 'control/ctrl_admin_product.inc.php';
$formControl = new ProductFormController();
?>
<h3>Product settings</h3>
<?php echo $formControl->getMessages(); ?>
<form id="admin_product_navi"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      method="post">
    <fieldset>
        <legend>Product selection</legend>
        Group:
        <select name="product_group" onchange="submit()">
            <option value="all">All</option>
            <?php echo $formControl->getProductGroupOptions(); ?>       
        </select>
        Product:
        <select name="product" onchange="submit()">
            <option value="new" >New</option>
            <?php echo $formControl->getProductOptions(); ?>
        </select>      
    </fieldset>
    <fieldset>
        <legend>
            Product: <?php echo htmlspecialchars($formControl->getProductName()); ?>
            ID: <?php echo htmlspecialchars($formControl->getProductID()); ?>
        </legend>
        Name:
        </br>
        <input type="text" name="name" value=
               "<?php echo htmlspecialchars($formControl->getProductName()); ?>"/>
        </br>
        Price:
        </br>
        <input type ="text" name="unit_price" value=
               "<?php echo htmlspecialchars($formControl->getProductPrice()); ?>"/>
        </br>
        Description:
        </br>
        <textarea name="description" rows ="5" cols="30"
        ><?php echo htmlspecialchars($formControl->getProductDescription()); ?></textarea>
        </br>
        Visibility:
        </br>
        <input type="radio" name="visibility" value="visible"
        <?php echo htmlspecialchars($formControl->getProductVisibleChecked()); ?>
               />Visible
        <input type="radio" name="visibility" value="hidden" 
        <?php echo htmlspecialchars($formControl->getProductHiddenChecked()); ?>
               />Hidden

    </fieldset>
    <fieldset>
        <legend>Product groups</legend>
        <?php echo $formControl->getProductGroupCheckBoxes(); ?>
    </fieldset>
    <fieldset>
        <legend>Save</legend>
        <input type ="submit" name="create" value="Save new product"/>
        <input type ="submit" name="save" value="Save changes"/>

    </fieldset>

</form>
