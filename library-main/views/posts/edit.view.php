<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>
<h1 class="center">Edit a Post</h1>
<form method="POST" class="center">
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
                <td>
                    <input name="name" value="<?= htmlspecialchars($_POST['name'] ?? $post['name']) ?>" />
                </td>
                <td>
                    <input name="author" value="<?= htmlspecialchars($_POST['author'] ?? $post['author']) ?>" />
                </td>
                <td>
                    <input name="release_date" value="<?= htmlspecialchars($_POST['release_date'] ?? $post['release_date']) ?>" />
                </td>
                <td>
                    <input name="availability" value="<?= htmlspecialchars($_POST['availability'] ?? $post['availability']) ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <button type="submit">Submit</button>
    <?php if (isset($errors['name'])) { ?>
        <p class="invalid-data"><?= htmlspecialchars($errors['name']) ?></p>
    <?php } ?>
    <?php if (isset($errors['author'])) { ?>
        <p class="invalid-data"><?= htmlspecialchars($errors['author']) ?></p>
    <?php } ?>
    <?php if (isset($errors['release_date'])) { ?>
        <p class="invalid-data"><?= htmlspecialchars($errors['release_date']) ?></p>
    <?php } ?>
    <?php if (isset($errors['availability'])) { ?>
        <p class="invalid-data"><?= htmlspecialchars($errors['availability']) ?></p>
    <?php } ?>
</form>
<?php
require "views/components/footer.php";  
?>
