<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<h1 class="center">Sveiks, <?= htmlspecialchars($_SESSION["username"])?>!</h1>

<?php if (!isset($_SESSION["admin"])) { ?>
<form method="POST" class="center">
    <h2>Change your username?</h2>
    <label>New username
        <input name="name" value="<?=htmlspecialchars($_POST["name"] ?? $_SESSION["username"]) ?>"/>
    </label>
    <label>Password
        <input type="password" name="password" value="<?= $_POST["password"] ?? "" ?>"/>
    </label>
    <button>Submit</button>
    <?php if (isset($errors["name"])) { ?>
            <p class="invalid-data"> <?= $errors["name"] ?> </p>
    <?php } ?>
</form>
<?php } else { ?>
    <h2 class="center">Kā admin tu neko nevari mainīt</h2>
<?php } ?>

        </br>

<form action="./logout" method="POST" class="center">
    <button class="buttonDanger">Logout</button>
</form>

<?php if (isset($errors["username"])) { ?>
     <p class="invalid-data"> <?= $errors["username"] ?> </p>
<?php } ?>
<?php if (isset($errors["password"])) { ?>
      <p class="invalid-data"> <?= $errors["password"] ?> </p>
<?php } ?>

<?php require "views/components/footer.php" ?>