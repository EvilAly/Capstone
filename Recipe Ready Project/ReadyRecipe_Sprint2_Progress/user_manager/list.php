<?php include 'includes/header.php'; ?>
<?php include 'includes/left_column.php'; ?>
<main id="main">
    <h1>Shopping List</h1>
    <?php foreach ($list_item as $item) : ?>
        echo " {$item['quantity']}  {$item['ingredient']}"<br>;
    <?php endforeach; ?>

</main>
<?php include 'includes/footer.php'; ?>
