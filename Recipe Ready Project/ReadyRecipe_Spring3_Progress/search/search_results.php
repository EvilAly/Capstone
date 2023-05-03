<?php include '../includes/header.php'; ?>
<?php include '../includes/left_search.php'; ?>
<main id="main">

    <?php echo "We have found " . count($recipes). " recipe(s):"; ?><br><br>

    <?php foreach ($recipes as $recipe) : ?>
        <?php
        $recName = $recipe['recName'];
        echo '<a href="../recipes/recipe.php?recName=' . urlencode($recName) . '">' . $recName . '</a><br>';
        echo '<form id="form_' . $recipe['recipeID'] . '" method="post" action="next_page.php">';
        echo '<input type="hidden" name="recipe" value="' . htmlentities(json_encode($recipe)) . '">';
        echo '</form>';
        ?>
    <?php endforeach; ?>

</main>
<?php include '../includes/footer.php'; ?>
