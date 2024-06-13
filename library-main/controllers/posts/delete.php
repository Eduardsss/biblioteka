<?php
auth();
require "./Database.php";
$config = require("./config.php");

$db = new Database($config);    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "DELETE FROM catalog WHERE id = :id";
    $params = [ ":id" => $_POST["id"]];
    $db->execute($query, $params);

    $query = "DELETE FROM borrowed_books WHERE book_id = :book_id";
    $params = [ ":book_id" => $_POST["id"]];
    $db->execute($query, $params);
}

header("Location: /");
die();