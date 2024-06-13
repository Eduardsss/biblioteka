<?php
auth();


$title = "Show (and tell)";
require_once("Database.php");

$config = require("config.php");
$db = new Database($config);

$query = "SELECT * FROM catalog WHERE id=:id";
// dd($_GET["id"]);
//dd($_SESSION["user-id"]);
$params = [":id"  => $_GET["id"]];
$post = $db->execute($query, $params)->fetch();

$query = "SELECT * FROM borrowed_books WHERE book_id=:book_id AND user_id=:user_id";
$params = [
            ":book_id"  => $_GET["id"],
            ":user_id" => $_SESSION["user-id"]
        ];
//dd($query);
$borrowed = $db
->execute($query, $params)
->fetch();

//if ($post["availability"] <= 0) {
 //   $errors["borrow"] = "No books left!";
//}

if ($borrowed != []) {
    $errors["borrow"] = "You already have this book!";
} elseif ($post["availability"] <= 0) {
    $errors["availability"] = "no books left!";
}



require "views/posts/show.view.php";