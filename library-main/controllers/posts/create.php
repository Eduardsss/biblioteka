<?php
auth();
require "Validator.php";
require "Database.php";
$config = require("./config.php");
$db = new Database($config);



//if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255) {
    // dd("Pos");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];


    if(!Validator::string($_POST["name"], min:1, max:255)) {
        $errors["name"] = "no name or too long";
    }
    
    if(!Validator::string($_POST["author"], min:1, max:255)) {
        $errors["author"] = "no author or too long";
    }

    if(!Validator::date($_POST["release_date"])) {
        $errors["release_date"] = "release date invalid";
    }

    if(!Validator::number($_POST["availability"], min:1, max:9999)) {
        $errors["availability"] = "no availability or too large";
    }
    if (empty($errors)) {


    $query = "INSERT INTO catalog (name, author, release_date, availability)
              VALUES (:name, :author, :release_date, :availability);";
              $params = [
                  ":name" => $_POST["name"],
                  ":author" => $_POST["author"],
                  ":release_date" => $_POST["release_date"],
                  ":availability" => $_POST["availability"],
              ];
              $db->execute($query, $params);
              header("Location: /");
              die();
            }
} 

// INSERT INTO catalog (name, author, release_date, availability)
// VALUES 
// ("50 shades of grey", "hjz", 2013, 2466)



$title = "Create stuff";
require "views/posts/create.view.php";