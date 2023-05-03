<?php

require('../model/database.php');
require('../model/search_db.php');

$recName = filter_input(INPUT_GET, 'recName', FILTER_SANITIZE_STRING);

$recipe = get_recipes($recName);
include('recipe.php');


