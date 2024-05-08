<?php
session_start();
require_once 'db_connection.php';

// Pārbaude, vai lietotājs ir autorizējies
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Iegūstam visus grāmatu ierakstus no datubāzes
$sql = "SELECT * FROM books";
$stmt = $db->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Books</title>
</head>
<body>
    <h2>List of Books</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['title'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['quantity'] ?></td>
                <td>
                    <a href="edit_book.php?id=<?= $book['id'] ?>">Edit</a>
                    <a href="delete_book.php?id=<?= $book['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
