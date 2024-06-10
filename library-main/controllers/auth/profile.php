<?php
auth();
require "Validator.php";
require "Database.php";
$config = require("./config.php");
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
   // password_verify($_POST["password"], $user["password"])

    if(!Validator::string($_POST["name"], min:1, max:50)) {
        $errors["username"] = "no name or too long";
    }

    $query = "SELECT * FROM users WHERE username = :username";
    $params = [
        ":username" => $_SESSION["username"]
    ];
    $user = $db->execute($query, $params)->fetch();

    if (password_verify($_POST["password"], $user["password"])) {
    if (empty($errors)) {

        $query = "UPDATE users
                SET username = :username
                WHERE id = :id";
        $params = [
                  ":username" => $_POST["name"],
                  ":id" => $_SESSION["user-id"]
              ];
        $db->execute($query, $params);

        $_SESSION["username"] = $_POST["name"];
        header("Location: /profile");
        die();
        }
    } else {
        $errors["password"] = "invalid password";
    }
}

$title = "Your profile";
require "views/auth/profile.view.php";