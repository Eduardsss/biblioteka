<?php 
require "views/components/head.php";
?>
    <h1 class="center"> Register</h1>
    <form method="POST" class="center">

        <label>Username
            <input name="username" value="<?= $_POST["username"] ?? "" ?>"/>
        </label>
        </br>
        <label>Password
            <input type="password" name="password" value="<?= $_POST["password"] ?? "" ?>"/>
        </label>
        <span class="explanation"> (8 rakstzimes, 1 liels, 1 mazs, 1 ipas simbols un 1 skaitlis) </span>
        </br>
        <button>Submit</button>
    </form>
    <a href="/login" class="center"> Log-in </a>
    </br>
    </br>
    <?php if (isset($errors["username"])) { ?>
                <p class="invalid-data"> <?= $errors["username"] ?> </p>
        <?php } ?>
        <?php if (isset($errors["password"])) { ?>
                <p class="invalid-data"> <?= $errors["password"] ?> </p>
        <?php } ?>
<?php
require "views/components/footer.php";  
?>