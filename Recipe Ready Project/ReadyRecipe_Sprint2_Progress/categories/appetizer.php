<?php include 'includes/header.php'; ?>
<?php include 'includes/left_column.php'; ?>
<main id="main">
    <h1>Appetizers</h1>
    <?php foreach ($recipes as $recipe) : ?>
    echo <a href="'$recipe'">'$recipe'</a><br>
           <?php endforeach; ?>
   
</main>
<?php include 'includes/footer.php'; ?>