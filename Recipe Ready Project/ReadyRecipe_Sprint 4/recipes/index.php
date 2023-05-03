<?php

session_start();

require('../model/database.php');
require('../model/search_db.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_recipe';
    }
}

if ($action == 'show_recipe') {

    $recName = filter_input(INPUT_GET, 'recName', FILTER_SANITIZE_STRING);

    $recipe = get_full_recipe($recName);
    include('recipe.php');
} else if ($action == 'saverec') {
    $recID = filter_input(INPUT_POST, 'recipe_id');

    $userID = $_SESSION['user'];

    $saved = check_saved($recID, $userID[0]);

    if (empty($saved)) {
        save_recipe($userID[0], $recID);
    }
    header("Location: ../user_manager/index.php?action=saved");
} else if ($action == 'savelist') {
    $userID = $_SESSION['user'];
    $quantity = isset($_POST['quantity']) && !empty($_POST['quantity']) ? $_POST['quantity'] : null;

    $ingredient_list = isset($_POST['ingredients']) && !empty($_POST['ingredients']) ? $_POST['ingredients'] : null;

    $shopping_list = shopping_list($userID[0]);

    if (is_array($quantity) && is_array($ingredient_list)) {

        foreach ($quantity as $index => $amt) {
            $name = $ingredient_list[$index];
            $qty = number_format(ceil(floatval($amt) * 100) / 100, 2);
            if (!array_search($name, array_column($shopping_list, 'ingredient'))) {
                add_to_list($userID[0], $qty, $name);
            } else {
                $prev_amt = get_amount($userID[0], $name);
                $total = add_quantities($prev_amt[0], $qty);
                update_list($userID[0], $total, $name);
            }
        }
    }
    header("Location: ../user_manager/index.php?action=savelist");
}
    