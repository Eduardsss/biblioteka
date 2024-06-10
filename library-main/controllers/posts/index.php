<?php

// Šis fails ir, lai izvadītu datus no datubāzes uz
// lapu

auth();

require "./Database.php";


$config = require("./config.php");
//include


// $query = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id";

$query = "SELECT * FROM catalog";

$params = [];

$db = new Database($config);
$posts = $db
            ->execute($query, $params)
            ->fetchAll();

$title = "No!";
require "./views/posts/index.view.php";
?>