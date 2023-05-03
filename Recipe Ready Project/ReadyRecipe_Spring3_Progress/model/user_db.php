<?php

//Check if entered email address is in the database.
//Used in new user create to prevent duplicates
function get_logIn($email) {
    global $db;
    $query = 'SELECT *
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
function update_list($userID, $qty, $name) {
    global $db;
    $query = 'UPDATE shoppingList
             SET amount = :amount
             AND ingredient = "ingredient
             WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':amount', $qty);
    $statement->bindValue(':ingredient', $name);
    $statement->execute();
    $statement->closeCursor();
    
}

//used to remove items from shopping list
function remove_from_list($userID, $name) {
    global $db;
    $query = 'DELETE FROM shoppingList
              WHERE userID = :userID
              AND ingredient = :ingredient)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':ingredient', $name);
    $statement->execute();
    $statement->closeCursor();
    
}

//used to return the password on log in for comparison
function get_user($email) {
    global $db;
    $query = 'SELECT pass FROM customers
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