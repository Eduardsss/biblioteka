<?php
guest();
require "Database.php";
require "Validator.php";
$config = require("config.php");
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!Validator::string($_POST["username"], min:1, max:255)) {
        $errors["username"] = "invalid username";
    }
    
    if(!Validator::string($_POST["password"], min:1, max:255)) {
        $errors["password"] = "invalid password";
    }

    
    $query = "SELECT * FROM users WHERE username = :username";
    $params = [
        ":username" => $_POST["username"]
    ];
    $user = $db->execute($query, $params)->fetch();
    if (!$user || !password_verify($_POST["password"], $user["password"])) {
        $errors["username"] = "Incorrect username or password";
    }

    if (empty($errors)) {
        $_SESSION["user"] = true;
        $_SESSION["user-id"] = $user["id"];
        if ($user["isAdmin"]) {
            $_SESSION["admin"] = true;
        }
        $_SESSION["username"] = $_POST["username"];
        header("Location: /");
        die();
    }
}

$title = "Log in";
require "views/auth/login.view.php";

unset($_SESSION["flash"]);
?>