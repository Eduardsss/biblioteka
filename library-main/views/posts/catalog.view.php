<?php 
require "components/head.php";
require "components/navbar.php";
?>
    <h1> Books </h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Author</th>
            <th>Release Date</th>
            <th>Availability</th>
        </tr>
        <?php foreach ($posts as $post) { ?>
            <tr>
                <td> <?=$post["name"]?> </td>
                <td> <?=$post["author"]?> </td>
                <td> <?=$post["release_date"]?> </td>
                <td> <?=$post["availability"]?> </td>
                <td>             <form method="POST" action="/delete">
                    <button name="id" value="<?= $post["id"] ?>">Delete</button>
                </form> </td>
            </tr>
        <?php } ?>
    </table>
<?php 
require "components/footer.php";
?>