<?php

//get all recipes for a given category
function get_category($cat_id) {
    global $db;
    $query = "SELECT * FROM recipes
        WHERE catID = :catID";
    $result = $db->prepare($query);
    $result->bindValue(':catID', $cat_id);
    $result->execute();
    $category = $result->fetchAll();
    return $category;
}

//get all recipes for a nutrition search
function get_nutriValues($searchValue, $min, $max) {
    global $db;
    $query = "SELECT * FROM recipes AS r
        INNER JOIN nutriValues AS n
        ON r.recipeID = n.recipeID
        WHERE n." . $searchValue . " BETWEEN :min AND :max";
    $statement = $db->prepare($query);
    $statement->bindValue(':min', $min);
    $statement->bindValue(':max', $max);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

//get all recipes with a given name
function get_recipes($name) {
    global $db;
    $query = "SELECT * FROM recipes 
        WHERE recName LIKE '%" . $name . "%'";
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

//get all recipes with a given ingredient
function get_ingredient($name) {
    global $db;
    $query = "SELECT * FROM recipes 
          WHERE JSON_EXTRACT(ingredients, '$.name') LIKE :name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', '%' . $name . '%');
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function get_all() {
    global $db;
    $query = "SELECT * FROM recipes";
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}
