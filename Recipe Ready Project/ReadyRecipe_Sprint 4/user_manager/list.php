<?php include '../includes/header.php'; ?>
<?php include '../includes/left_other.php'; ?>

<main id="main">
    <h1>Shopping List</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="update">
        <?php
        if (empty($list_item)) {
            echo "You have no items on your shopping list.";
        } else {
            foreach ($list_item as $key => $item) :
                ?>
                <table>
                    <td>
                        <input type="text" name="updateqty[<?php echo $key; ?>][amount]" value="<?php echo $item['amount']; ?>">    
                        <input type="hidden" name="updateqty[<?php echo $key; ?>][ingredient]" value="<?php echo $item['ingredient']; ?>">
                    </td>
                    <td>
                        <?= $item['ingredient'] ?>
                    </td>
                </table>
                <?php
            endforeach;
        }
        ?>
        <br><br>
        <input type="submit" value="Update List">
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
    <?php echo '<p><a href=".?action=empty_list">Empty List</a>'; ?>

</main>
<?php include '../includes/footer.php'; ?>
