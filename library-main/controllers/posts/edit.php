<?php
auth();
//dd($_POST);
//$url_array = parse_url($_SERVER["REQUEST_URI"]);
//dd($url_array["query"]);
//$url = $url_array["path"];

require "Validator.php";
require "Database.php";
$config = require("./config.php");
$db = new Database($config);



//if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255) {
    // dd("Pos");
//dd(date_parse($_POST["release_date"]));

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

    if(!Validator::number($_POST["availability"], min:0, max:9999)) {
        $errors["availability"] = "invalid availability ( less than 0 or over 9999 )";
    }
    if (empty($errors)) {

        $query = "UPDATE catalog
                SET name = :name, author = :author, release_date = :release_date, availability = :availability
                WHERE id = :id";
        $params = [
                  ":name" => $_POST["name"],
                  ":author" => $_POST["author"],
                  ":release_date" => $_POST["release_date"],
                  ":availability" => $_POST["availability"],
                  ":id" => $_GET["id"]
              ];
        $db->execute($query, $params);

        header("Location: /");
        die();
    }
}

$query = "SELECT * FROM catalog WHERE id = :id";

$params = [
    ":id" => $_GET["id"]
];
$post = $db
            ->execute($query, $params)
            ->fetch();



$title = "Edit stuff";
require "views/posts/edit.view.php";