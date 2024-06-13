<?php 
require "./views/components/head.php";
require "./views/components/navbar.php";
?>

<main class="main-container">
    <?php if ($posts == []) { ?>
        <h1 class="center">Pašlaik nav pieejama neviena grāmata!</h1>
    <?php } else { ?>
        <h1 class="center">Grāmatas</h1>
        <div class="books-grid">
            <?php foreach ($posts as $post) { ?>
                <div class="book-card">
                    <a href="./show?id=<?= $post["id"] ?>" class="book-link">
                        <h2 class="book-title"><?= htmlspecialchars($post["name"]) ?></h2>
                        <p class="book-author">Autors: <?= htmlspecialchars($post["author"]) ?></p>
                        <p class="book-release-date">Izlaistas: <?= htmlspecialchars($post["release_date"]) ?></p>
                        <p class="book-availability">Pieejamas: <?= htmlspecialchars($post["availability"]) ?> grāmatas</p>
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
            <?php } ?>
        </div>
    <?php } ?>
</main>

<?php require "./views/components/footer.php"; ?>
