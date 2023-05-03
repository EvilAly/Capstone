<?php include '../includes/header.php'; ?>
<?php include '../includes/left_other.php'; ?>
<main id="main">

    <?php
    foreach ($recipe as $row) {
        $ingredients = json_decode($row['ingredients']);
        $directions = json_decode($row['directions']);
        

        echo "<h1>" . $row['recName'] . "</h1><br><br>";
        if (isset($row['cookTime'])) {
            echo "Cook Time: " . $row['cookTime'] . "<br>";
        }
        if (isset($row['prepTime'])) {
            echo "Prep Time: " . $row['prepTime'] . "<br>";
        }
        ?>

        <table id="ingredients">
            <?php foreach ($ingredients as $item) { ?>
                <tr>
                    <td><?php echo $item->quantity; ?></td>
                    <td><?php echo $item->name; ?></td>
                </tr>
            <?php } ?>
        </table>

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
