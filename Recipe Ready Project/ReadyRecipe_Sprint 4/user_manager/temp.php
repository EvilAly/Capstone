<?php include '../includes/header.php'; ?>
<?php include '../includes/left_other.php'; ?>

<main id="main">
    <h1>Shopping List</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="update">
        <?php
        if (empty($list_item)) {
            echo "You have no items on your shopping list.";
            ?>

            <?php
        } else {
            foreach ($list_item as $key => $item) :
                ?>
                <table>
                    <td>
                        <input type="text"
                               name="updateqty[<?php echo $key; ?>]"
                               value="<?php echo $item['amount']; ?>">

                    </td>
                    <td> 
                        <?= $item['ingredient'] ?>
                    </td><br>
                    <?php
                endforeach;
            }
            ?>
            <tr>
            <br><td colspan="4" class="right">
                <input type="hidden" name="action" value="update">
                <input type="submit" value="Update List">
            </td>
            </tr>
        </table>
    </form>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_new">
        <table>


            <tr>
                <td><label for="newqty">Quantity:</label></td>
                <td><input type="text" name="newqty"></td>
            </tr>
            <tr>
                <td><label for="newingredient">Ingredient:</label></td>
                <td><input type="text" name="newingredient"></td>
            </tr>

        </table>
        <input type="submit" value="Add Item">
    </form>
    <br><br>
    <p>Click "Update List" to update quantities in your
        cart.<br> Enter a quantity of 0 to remove an item.
    </p>
    <?php echo '<p><a href=".?action=empty_cart">Empty Cart</a>'; ?>

</main>
<?php include '../includes/footer.php'; ?>
