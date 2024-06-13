<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>

<main class="main-container">
    <h1 class="center">Book</h1>
    <div class="books-grid">
        <div class="book-card">
            <a href="./show?id=<?= $post["id"] ?>" class="book-link">
                <h2 class="book-title"><?= htmlspecialchars($post["name"]) ?></h2>
                <p class="book-author"><?= htmlspecialchars($post["author"]) ?></p>
                <p class="book-release-date">Released: <?= htmlspecialchars($post["release_date"]) ?></p>
                <p class="book-availability">Status: <?= htmlspecialchars($post["availability"]) ?></p>
            </a>
            <?php if (isset($_SESSION["admin"])) { ?>
                <div class="admin-actions">
                    <form action="/edit" method="get">
                        <button name="id" value="<?= $post["id"] ?>" class="button-edit">Edit</button>
                    </form>
                    <form method="POST" action="/delete">
                        <button name="id" value="<?= $post["id"] ?>" class="button-delete">Delete</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($errors["availability"])) { ?>
        <p class="center"><?= $errors["availability"] ?></p>
    <?php } elseif (isset($errors["borrow"])) { ?>
        <a href="/return?id=<?= $post["id"] ?>" class="button center">Return book</a>
        <p class="center"><?= $errors["borrow"] ?></p>
    <?php } else { ?>
        <a href="/borrow?id=<?= $post["id"] ?>" class="button center">Borrow book</a> 
    <?php } ?>
</main>

<?php
require "views/components/footer.php";
?>
