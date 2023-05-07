<?php

//Check if entered email address is in the database.
//Used in new user create to prevent duplicates
function get_logIn($email) {
    global $db;
    $query = 'SELECT pass
              FROM userInfo
              WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

//creates new user in database
function create_user($firstName, $lastName, $email, $pass) {
    global $db;
    $query = 'INSERT INTO userInfo
                 (firstName, lastName, emailAddress, pass)
              VALUES
                 (:firstName, :lastName, :email, :pass)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pass', $pass);
    $statement->execute();
    $statement->closeCursor();
}

//adds item to shopping list
function add_to_list($userID, $qty, $name) {
    global $db;
    $query = 'INSERT INTO shoppingList
                 (userID, amount, ingredient)
              VALUES
                 (:userID, :amount, :ingredient)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':amount', $qty);
    $statement->bindValue(':ingredient', $name);
    $statement->execute();
    $statement->closeCursor();
}

//used to update quantities on shopping list
function update_list($userID, $amount, $ingredient) {
    global $db;
    $query = "UPDATE shoppinglist SET amount = :amount "
        . "WHERE userID = :userID AND ingredient = :ingredient";
    $statement = $db->prepare($query);
    $statement->bindValue(':amount', $amount);
    $statement->bindValue(':ingredient', $ingredient);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $statement->closeCursor();
}

//used to remove items from shopping list
function remove_from_list($userID, $ingredient) {
    global $db;
    $query = 'DELETE FROM shoppingList
              WHERE userID = :userID
              AND ingredient = :ingredient';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':ingredient', $ingredient);
    $statement->execute();
    $statement->closeCursor();
}

//used to return the password on log in for comparison
function get_user($email) {
    global $db;
    $query = 'SELECT userID FROM userinfo
              WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $password = $statement->fetch();
    $statement->closeCursor();
    return $password;
}

//saves recipe to user
function save_recipe($userID, $recID) {
    global $db;
    $query = 'INSERT INTO savedRec
                 (userID, recipeID)
              VALUES
                 (:userID, :recipeID)';
    $statement = $db->prepare($query);
    //bind your values
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':recipeID', $recID);
    $statement->execute();
    $statement->closeCursor();
}

//used to update a user's password
function update_pass($email, $hash) {
    global $db;
    $query = 'UPDATE userInfo
              SET pass = :hash
              WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':hash', $hash);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}

function empty_list($userID) {
    global $db;
    $query = 'DELETE FROM shoppinglist
              WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $statement->closeCursor();
}

function saved_recipes($userID) {
    global $db;
    $query = "SELECT * FROM recipes AS r "
            . "INNER JOIN savedRec AS s ON r.recipeID = s.recipeID "
            . "WHERE userID = :userID";
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function shopping_list($userID) {
    global $db;
    $query = "SELECT * FROM shoppingList "
            . "WHERE userID = :userID";
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function get_amount($userID, $ingredient) {
    global $db;
    $query = "SELECT amount FROM shoppingList "
            . "WHERE userID = :userID "
            . "AND ingredient = :ingredient";
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':ingredient', $ingredient);
    $statement->execute();
    $prev_amt = $statement->fetch();
    $statement->closeCursor();
    return $prev_amt;
}

function add_quantities($qty1, $qty2) {
    // Convert the quantities to a decimal format
    $dec_qty1 = convert_to_decimal($qty1);
    $dec_qty2 = convert_to_decimal($qty2);

    // Add the decimal quantities together
    $total_qty = $dec_qty1 + $dec_qty2;

    return $total_qty;
}

// Function to convert a fraction quantity to a decimal format
function convert_to_decimal($frac_qty) {
    // Split the fraction into its numerator and denominator parts
    $parts = explode("/", $frac_qty);

    // If there is only one part, the quantity is already in decimal format
    if (count($parts) == 1) {
        return $parts[0];
    }

    // Otherwise, calculate the decimal equivalent of the fraction
    return $parts[0];
}

function check_saved($recID, $userID) {
    global $db;
    $query = "SELECT * FROM savedRec "
            . "WHERE userID = :userID AND recipeID = :recipeID";
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':recipeID', $recID);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}
