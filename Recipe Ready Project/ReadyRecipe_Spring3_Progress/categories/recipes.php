<?php include '../includes/header.php'; ?>
<?php include '../includes/left_cats.php'; ?>
<main id="main">
    <!-- This page should only return the Breakfasts in the database. -->
    <h1>All Recipes</h1>
    <?php echo "We have found " . count($recipes). " recipe(s):"; ?><br><br>

    <?php foreach ($recipes as $recipe) : ?>
        <?php
        $recName = $recipe['recName'];
        echo '<a href="../recipes/index.php?recName=' . urlencode($recName) . '">' . $recName . '</a><br>';
        echo '<form id="form_' . $recipe['recipeID'] . '" method="post" action="next_page.php">';
        echo '<input type="hidden" name="recipe" value="' . htmlentities(json_encode($recipe)) . '"><br>';
        echo '</form>';
        ?>
    <?php endforeach; ?>
   
</main>
<?php include '../includes/footer.php'; ?>
