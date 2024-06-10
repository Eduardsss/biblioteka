<?php 
require "views/components/head.php";
?>
    <h1 class="center"> Log-in </h1>
    <form method="POST" class="center">

        <label>Username
            <input type="username" name="username" value="<?= $_POST["username"] ?? "" ?>"/>
        </label>
        </br>
        <label>Password
            <input type="password" name="password" value="<?= $_POST["password"] ?? "" ?>"/>
        </label>
        </br>
        <button>Submit</button>
    </form>
    <a href="/register" class="center"> Register </a>

    <?php if(isset($_SESSION["flash"])) { ?>
        <p class="flash"> <?=$_SESSION["flash"]?></p>
    <?php } ?>


    <?php if (isset($errors["username"])) { ?>
                <p class="invalid-data"> <?= $errors["username"] ?> </p>
        <?php } ?>
        <?php if (isset($errors["password"])) { ?>
                <p class="invalid-data"> <?= $errors["password"] ?> </p>
        <?php } ?>

<?php
require "views/components/footer.php";  
?>