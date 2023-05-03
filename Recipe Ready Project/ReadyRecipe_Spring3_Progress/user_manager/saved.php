<?php include 'includes/header.php'; ?>
<?php include 'includes/left_column.php'; ?>
<main id="main">
    <?php foreach ($recipes as $recipe) : ?>
    echo <a href="$recipe">$recipe</a><br>
           <?php endforeach; ?>
   
</main>
<?php include 'includes/footer.php'; ?>
