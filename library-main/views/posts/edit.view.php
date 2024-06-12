<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>
    <h1 class="center"> Edit a Post </h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Release Date</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td> <?=$post["name"]?> </td>
                    <td> <?=$post["author"]?> </td>
                    <td> <?=$post["release_date"]?> </td>
                    <td> <?=$post["availability"]?> </td>
                </tr>
        </tbody>
    </table>

    </br>

    <form method="POST" class="center">
        <label>Name
            <input name="name" value="<?= $_POST["name"] ?? $post["name"] ?>"/>
        </label>
        <label>Author
            <input name="author" value="<?= $_POST["author"] ?? $post["author"] ?>"/>
        </label>
        <label>Release year
            <input name="release_date" value="<?= $_POST["release_date"] ?? $post["release_date"] ?>"/>
        </label>
        <label>Availability
            <input name="availability" value="<?= $_POST["availability"] ?? $post["availability"] ?>"/>
        </label>
        <button>Submit</button>
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
<?php
require "views/components/footer.php";  
?>