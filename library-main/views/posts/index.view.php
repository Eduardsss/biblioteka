<?php 
require "./views/components/head.php";
require "./views/components/navbar.php";
?>
            <?php if ($posts == []) { ?>
            <h1 class="center"> There are no books!</h1>
            <?php } else { ?>
    <h1 class="center"> Books </h1>
    <table class="zigzag">
        <thead>
            <tr>
                <th class="header">Name</th>
                <th class="header">Author</th>
                <th class="header">Release Date</th>
                <th class="header">Availability</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post) { ?>
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
        <?php }} ?>
        </tbody>
    </table>
        </br>   
</form>
    <?php
require "./views/components/footer.php";
?>