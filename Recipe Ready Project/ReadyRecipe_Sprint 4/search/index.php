<?php

session_start();

require('../model/database.php');
require('../model/search_db.php');

//determine the action
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'search';
    }
}

if ($action == 'search') {
    $search = filter_input(INPUT_POST, 'searchType');

    if ($search == 'recName') {
        //get text from text field
        $text = filter_input(INPUT_POST, 'recipeName');
        //if null go back to search page
        if (empty($text)) {
            header("Location: search.php");
        } else {
            //format text to camelcase
            $name = ucwords($text);

            $recipes = get_recipes($name);

            if (empty($recipes)) {
                include('no_results.php');
            } else {
                $_SESSION['search'] = $recipes;
                include('search_results.php');
            }
        }
    } else if ($search == 'ingredient') {
        $name = filter_input(INPUT_POST, 'ingredientName');

        if (empty($name)) {
            header("Location: search.php");
        } else {

            $recipes = get_ingredient($name);

            if (empty($recipes)) {
                include('no_results.php');
            } else {
                $_SESSION['search'] = $recipes;
                include('search_results.php');
            }
        }
    } else {
        if ($search == 'calories') {
            $min = filter_input(INPUT_POST, 'calMin');
            $max = filter_input(INPUT_POST, 'calMax');
        } elseif ($search == 'fat' | $search == 'carbohydrates' | $search == 'sugar' | $search == 'protein') {
            $min = filter_input(INPUT_POST, 'gramsMin');
            $max = filter_input(INPUT_POST, 'gramsMax');
        } else {

            $min = filter_input(INPUT_POST, 'mgMin');
            $max = filter_input(INPUT_POST, 'mgMax');
        }
        if ($min == '' || empty($max)) {
            header("Location: search.php");
        }

        $recipes = get_nutriValues($search, $min, $max);

        if (empty($recipes)) {
            include('no_results.php');
        } else {
            $_SESSION['search'] = $recipes;
            include('search_results.php');
        }
    }
}
?>