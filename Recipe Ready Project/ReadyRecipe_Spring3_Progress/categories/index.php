<?php

require('../model/database.php');
require('../model/search_db.php');
~~~~~
//determine the action
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_list';
    }
}

if ($action == 'breakfast') {
    $recipes = get_category("1");
    include('breakfast.php');
} else if ($action == 'appetizer') {
    $recipes = get_category("2");
    include('appetizer.php');
}else if ($action == 'dinner') {
    $recipes = get_category("3");
    include('dinner.php');
}else if ($action == 'dessert') {
    $recipes = get_category("4");
    include('dessert.php');
} else {
    $recipes = get_all();
    include('recipes.php');
}
?>