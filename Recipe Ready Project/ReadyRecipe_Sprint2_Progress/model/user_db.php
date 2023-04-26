<?php

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

function create_user($firstName, $lastName, $email, $pass) {
    global $db;
    $query = 'INSERT INTO userInfo
                 (firstName, lastName, emailAddress, pass)
              VALUES
                 (:firstName, :lastName, :email, :pass)';
    $statement = $db->prepare($query);
    //bind your values
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pass', $pass);
    $statement->execute();
    $statement->closeCursor();
}

function add_to_list() {
    
}

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
