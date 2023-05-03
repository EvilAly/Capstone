<?php include '../includes/header.php'; ?>
<?php include '../includes/left_column_all.php'; ?>

<main id="main">
    <h1>Shopping List</h1>
    <?php
    if (empty($list_item)) {
        echo "You have no items on your shopping list.";
    } else {
        foreach ($list_item as $item) :
            ?>
            <?= $item['quantity'] ?> <?= $item['ingredient'] ?>"<br>;
        <?php endforeach;
    }
    ?>

</main>
<?php include '../includes/footer.php'; ?>
