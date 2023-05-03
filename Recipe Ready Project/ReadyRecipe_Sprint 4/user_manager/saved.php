<?php include '../includes/header.php'; ?>
<?php include '../includes/left_other.php'; ?>
<main id="main">
    <h1>Saved Recipes</h1>
    <?php
    if (empty($recipes)) {
        echo "You have no saved recipes.";
    } else {
        foreach ($recipes as $recipe) :

            $recName = $recipe['recName'];
            echo '<a href="../recipes/index.php?recName=' . urlencode($recName) . '">' . $recName . '</a><br>';
            echo '<form id="form_' . $recipe['recipeID'] . '" method="post" action="next_page.php">';
            echo '<input type="hidden" name="recipe" value="' . htmlentities(json_encode($recipe)) . '"><br>';
            echo '</form>';
            ?>
        <?php endforeach;
    } ?>

</main>
<?php include '../includes/footer.php'; ?>
