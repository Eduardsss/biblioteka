<?php
auth();
$title = "Borrowed books";
require "Validator.php";
require "Database.php";
$config = require("./config.php");



    $query = "SELECT * FROM users WHERE id = :id"; 
    $params = [":id" => $_SESSION["user-id"]];
    $db = new DataBase($config);
    $user = $db->execute($query, $params)->fetch();

    $query = "SELECT * FROM borrowed_books WHERE user_id = :user_id"; 
    $params = ["user_id" => $_SESSION["user-id"]];
    $borrowed_books = $db->execute($query, $params)->fetchAll();

    require "views/posts/borrowed.view.php";