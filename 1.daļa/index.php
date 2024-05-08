<?php
session_start();
// Pārbaude, vai lietotājs ir autorizējies
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
</head>
<body>
    <h2>Welcome to Library Management System</h2>
    <ul>
        <li><a href="books.php">View All Books</a></li>
        <li><a href="add_book.php">Add New Book</a></li>
    </ul>
</body>
</html>
