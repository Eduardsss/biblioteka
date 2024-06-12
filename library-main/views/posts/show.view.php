<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>

<h1 class="center"> Book </h1>
    <table>
        <thead>
            <tr>
                <th class="header">Name</th>
                <th class="header">Author</th>
                <th class="header">Release Date</th>
                <th class="header">Availability</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                    <td> <a href="./show?id=<?= $post["id"] ?>" class="tableLink"> <?=htmlspecialchars($post["name"])?> </a> </td>
                    <td> <a href="./show?id=<?= $post["id"] ?>" class="tableLink"> <?=htmlspecialchars($post["author"])?> </a> </td>
                    <td> <a href="./show?id=<?= $post["id"] ?>" class="tableLink"> <?=htmlspecialchars($post["release_date"])?> </a> </td>
                    <td> <a href="./show?id=<?= $post["id"] ?>" class="tableLink"> <?=htmlspecialchars($post["availability"])?> </a> </td>
                <?php if (isset($_SESSION["admin"])) { ?>
                    <td>             <form action="/edit">
                        <button name="id" value="<?= $post["id"] ?>" style="width:100%;height:100%;">Edit</button>
                        </form> 
                    </td>

                    <td>            
                        <form method="POST" action="/delete">
                            <button name="id" value="<?= $post["id"] ?>" style="width:100%;height:100%;" class="buttonDanger">Delete</button>
                        </form> 
                    </td>
               <?php }?>
            </tr>
        </tbody>
    </table>
    <?php if(isset($errors["availability"])) { ?>
        <p class="center"><?= $errors["availability"] ?></p>        
        <?php } elseif (isset($errors["borrow"])){ ?>
            <a href="/return?id=<?= $post["id"] ?>"  class="center">Return book</a>
            <p class="center"><?= $errors["borrow"] ?></p>
        <?php }else{ ?>
            <a href="/borrow?id=<?= $post["id"] ?>"  class="center">Borrow book</a> 
        <?php } ?>
<?php
require "views/components/footer.php";  
?>
