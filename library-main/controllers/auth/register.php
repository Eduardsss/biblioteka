<?php

guest();

$title = "Register";
require "./Database.php";
require "Validator.php";
$config = require("./config.php");
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!Validator::string($_POST["username"], $min=0, $max=50)) {
        $errors["username"] = "Nepareizi ievadits username";
    }
    
    if(!Validator::password($_POST["password"])) {
        $errors["password"] = "Nepareizs paroles formats";
    }

    $query = "SELECT * FROM users WHERE username = :username";
    $params = [":username" => $_POST["username"]];
    $result = $db
    ->execute($query, $params)
    ->fetch();

    if ($result) {
        $errors["username"] = "Lietotajvards jau aiznemts!";
    }

    if (empty($errors)) {
        $query = "INSERT INTO users (username, password)
        VALUES (:username, :password);";
        $params = [
            ":username" => $_POST["username"],
            ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
        ];
        $db->execute($query, $params);

        $_SESSION["flash"] = "Konts uztaisīt";
        header("Location: /login");
        die();
    }
}

require "./views/auth/register.view.php";
?>