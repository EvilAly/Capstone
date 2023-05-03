<?php

// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

require('../model/database.php');
require('../model/user_db.php');

//determine the action
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_list';
    }
}

if ($action == 'add_user') {
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');
    $pass2 = filter_input(INPUT_POST, 'pass2');

    if (empty($firstName) || empty($lastName) ||
            empty($email) || empty($pass) ||
            empty($pass2)) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    }
    if ($pass != $pass2) {
        $error = "Passwords do not match.";
        include('../errors/error.php');
    } else {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
    }

    $users = get_logIn($email);

    if (!empty($users)) {
        $error = "This email address already exists.";
        include('../errors/error.php');
    } else {
        create_user($firstName, $lastName, $email, $hash);
        header("Location: new_user.php");
    }

    $userID = get_user($email);

    $_SESSION['user'] = $userID;
    include('new_user.php');
} else if ($action == 'log_in') {
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');

    if (empty($email) || empty($pass)) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    }

    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $password = get_logIn($email);

    if (empty($password)) {
        $error = "This email does not exist.";
        include('../errors/error.php');
    } else {
        if ($password != $hash) {
            $error = "UserName or Password does not match.";
            include('../errors/error.php');
        } else {
            $userID = get_user($email);
            $_SESSION['user'] = $userID;
            include('list.php');
        }
    }
} else if ($action == 'reset') {
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');
    $pass2 = filter_input(INPUT_POST, 'pass2');

    if (empty($email) || empty($pass) ||
            empty($pass2)) {
        $error = "All fields not complete. Check all fields and try again.";
        include('../errors/error.php');
    }
    if ($pass != $pass2) {
        $error = "Passwords do not match.";
        include('../errors/error.php');
    } else {
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $user = get_user($email);

        if (empty($user)) {
            $error = "This email does not exist.";
            include('../errors/error.php');
        } else {
            update_pass($email, $hash);
            header("Location: ../index.php");
        }
    }
}
?>