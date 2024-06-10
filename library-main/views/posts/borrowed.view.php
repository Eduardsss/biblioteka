<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>
<main>
    <?php if($borrowed_books != []){ ?>
    <div>
        <h1 class="center">Borrowed books</h1>
        <div>
            <ul>
            <?php foreach ($borrowed_books as $book) { ?>
                <li><p><?= "'" . $book["name"] . "', the return date of this book is: "
                 . 
                 $book["return_date"] ?> 
                 </p>
                 <a href="/return?id=<?= $book["book_id"] ?>">
                 Return!
                </a>
            </li>            
            <hr>
            <?php } ?>
            </ul>
        </div>
    </div>
    <?php }else { ?>
    <h1 class="center">No books borrowed</h1>
    <?php }; ?>
</main>
<?php require "views/components/footer.php" ?>