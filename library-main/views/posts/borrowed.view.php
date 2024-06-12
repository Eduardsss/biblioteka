<?php require "views/components/head.php"; ?>
<?php require "views/components/navbar.php"; ?>

<main class="main-container">
    <?php if($borrowed_books != []) { ?>
        <div class="borrowed-books-container">
            <h1 class="center">Borrowed Books</h1>
            <div class="books-grid">
                <?php foreach ($borrowed_books as $book) { ?>
                    <div class="book-card">
                        <p class="book-title"><?= $book["name"] ?></p>
                        <p class="return-date">Return by: <?= $book["return_date"] ?></p>
                        <a class="return-link" href="/return?id=<?= $book["book_id"] ?>">Return!</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <h1 class="center">No Books Borrowed</h1>
    <?php } ?>
</main>

<?php require "views/components/footer.php"; ?>
