<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>
    <h1 class="center"> Pievieno grāmatu </h1>
    <?php if (isset($_SESSION["admin"])) { ?>
    <form method="POST" class="center">
        <label>Vārds
            <input type="text" name="name" value="<?= $_POST["name"] ?? "" ?>"/>
        </label>
        <label>Autors
            <input type="text" name="author" value="<?= $_POST["author"] ?? "" ?>"/>
        </label>
        <label>Release date (YYYY-MM-DD)
            <input type="text" name="release_date" value="<?= $_POST["release_date"] ?? "" ?>"/>
        </label>
        <label>Cik grāmatas ir pieejamas
            <input type="text" name="availability" value="<?= $_POST["availability"] ?? "" ?>"/>
        </label>
        <button>Pievienot!</button>
        <?php if (isset($errors["name"])) { ?>
                <p class="invalid-data"> <?= $errors["name"] ?> </p>
        <?php } ?>
        <?php if (isset($errors["author"])) { ?>
                <p class="invalid-data"> <?= $errors["author"] ?> </p>
        <?php } ?>
        <?php if (isset($errors["release_date"])) { ?>
                <p class="invalid-data"> <?= $errors["release_date"] ?> </p>
        <?php } ?>
        <?php if (isset($errors["availability"])) { ?>
                <p class="invalid-data"> <?= $errors["availability"] ?> </p>
        <?php } ?>
    </form>
    <?php } else { ?>
        <h2>Tev nav admin kas nozīmē ka tu nevari pievienot grāmatas</h2>
    <?php } ?>
<?php
require "views/components/footer.php";  
?>