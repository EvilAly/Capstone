<?php

// Start session management with a persistent cookie
session_set_cookie_params(0, '/ReadyRecipe', $_SERVER['HTTP_HOST']);
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
    $regex = "/^(?=.*[A-Z])(?=.*[\W_])(?=.{8,})/";

    if (empty($firstName) || empty($lastName) ||
            empty($email) || empty($pass) ||
            empty($pass2)) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    }
    if ($pass != $pass2) {
        $error = "Passwords do not match.";
        include('../errors/error.php');
        return;
    } else {
        if (preg_match($regex, $pass)) {
            $hash = password_hash($pass, PASSWORD_BCRYPT);
            
        } else {
            $error = "Passwords need to be a minimum of 8 characters and include a capital letter and special character.";
            include('create_user.php');
            return;
        }

        $users = get_logIn($email);

        if (!empty($users)) {
            $error = "This email address already exists.";
            include('../errors/error.php');
            return;
        } else {
            create_user($firstName, $lastName, $email, $hash);
            header("Location: new_user.php");
        }
    }
} else if ($action == 'log_in') {
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');

    if (empty($email) || empty($pass)) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
        return;
    }

    $stored = get_logIn($email);

    if (empty($stored)) {
        $error = "This email does not exist.";
        include('../errors/error.php');
        return;
    } else {
        $stored_hash = $stored[0][0];
        if (password_verify($pass, $stored_hash)) {
            $userID = get_user($email);
            $_SESSION['user'] = $userID;
            header("Location: index.php?action=savelist");
        } else {
            $error = "UserName or Password does not match.";
            include('../errors/error.php');
            return;
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
        return;
    }
    if ($pass != $pass2) {
        $error = "Passwords do not match.";
        include('../errors/error.php');
        return;
    } else {
        $hash = password_hash($pass, PASSWORD_BCRYPT);

        $user = get_user($email);

        if (empty($user)) {
            $error = "This email does not exist.";
            include('../errors/error.php');
            return;
        } else {
            update_pass($email, $hash);
            header("Location: ../index.php");
        }
    }
} else if ($action == 'saverec') {
    $recID = filter_input(INPUT_POST, 'recipe_id');

    $userID = $_SESSION['user'];

    $saved = check_saved($recID, $userID);

    if (empty($saved)) {
        save_recipe($userID, $recID);
    }
    header("Location: index.php?action=saved");
} else if ($action == 'savelist') {

    $userID = $_SESSION['user'];
    $list_item = shopping_list($userID[0]);
    include('list.php');
} else if ($action == 'empty_list') {
    $userID = $_SESSION['user'];
    empty_list($userID[0]);
    include('list.php');
} else if ($action == 'saved') {

    $userID = $_SESSION['user'];
    $recipes = saved_recipes($userID[0]);
    include('saved.php');
} else if ($action == 'update') {
    $userID = $_SESSION['user'];

    foreach ($_POST['updateqty'] as $key => $item) {
        if ($item['amount'] == 0) {
            remove_from_list($userID[0], $item['ingredient']);
        } else {
            update_list($userID[0], $item['amount'], $item['ingredient']);
        }
    } header("Location: index.php?action=savelist");
} else if ($action == 'logout') {
    session_destroy();
    header("Location: ../index.php");
} else if ($action == 'list') {
    $userID = $_SESSION['user'];
    $list_item = shopping_list($userID[0]);
    include('list.php');
} else if ($action == 'add_new') {
    $userID = $_SESSION['user'];
    $qty = filter_input(INPUT_POST, 'newqty', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'newingredient', FILTER_SANITIZE_STRING);
    add_to_list($userID[0], $qty, $name);
    header("Location: index.php?action=savelist");
}
?>