<?php include '../includes/header.php'; ?>
<?php include '../includes/left_other.php'; ?>
<main id="main">


    <b><?php
        foreach ($recipe as $row) {
            $ingredients = json_decode($row['ingredients']);
            $directions = json_decode($row['directions']);

            echo '<img id ="pic" src="../images/' . $row["recName"] . '.jpg" alt="' . $row["recName"] . '">';

            echo "<h1>" . $row['recName'] . "</h1><br><br>";

            if (isset($_SESSION['user'])) { //Button to save recipe
                echo '<form action="." method="post">';
                echo '<input type="hidden" name="action" value="saverec">';
                echo '<input type="hidden" name="recipe_id" value="' . $row["recipeID"] . '">';
                echo '<button type="submit">Save Recipe</button></form>';
            }

            if (isset($row['cookTime'])) {
                echo "Cook Time: " . $row['cookTime'] . "<br>";
            }
            if (isset($row['prepTime'])) {
                echo "Prep Time: " . $row['prepTime'] . "<br>";
            }
            ?></b><br>
        <?php
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : array();
        $ingredient_list = isset($_POST['ingredients']) ? $_POST['ingredients'] : array();
        ?>
        <!--button to save ingredients-->
        <form action="." method="post">
            <input type="hidden" name="action" value="savelist">
            <table id="ingredients">
                <?php foreach ($ingredients as $item) { ?>
                    <tr>
                        <td><input type="hidden" name="quantity[]" value="<?php echo $item->quantity; ?>">
                            <input type="hidden" name="ingredients[]" value="<?php echo $item->name; ?>"> </td>
                        <td><?php echo $item->quantity; ?></td>
                        <td><?php echo $item->name; ?></td>
                    </tr>
                <?php }
                ?>
            </table>
            <?php if (isset($_SESSION['user'])) { ?>
                <button type="submit">Save to Shopping List</button>
            <?php } ?>
        </form><br>
        <table id="directions"> 

            <?php foreach ($directions as $step) { ?>
                <tr>
                    <td><?php echo $step->step ?></td>
                    <td><?php echo $step->instruction; ?></td>
                </tr>
            <?php }
            ?>
        </table>
    <?php } ?>

</main>
<?php include '../includes/footer.php'; ?>
