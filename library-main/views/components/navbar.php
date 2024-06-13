<header>
    <nav>
        <ul>
            <li>
                <img src="book.PNG" alt="Logo" class="logo">
            </li>
            <li>
                <form action="/">
                    <button class="nav-button">Grāmatas</button>
                </form>
            </li>
            <li>
                <form action="./borrowed">
                    <button class="nav-button">Aizņemtās</button>
                </form>
            </li>
            <?php if (isset($_SESSION["admin"])) { ?>
                <li>
                    <form action="./create">
                        <button class="nav-button">Pievieno</button>
                    </form>
                </li>
            <?php } ?>
            <li>
                <form action="./profile">
                    <button class="nav-button">Tavs profils</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
<main>
    <!-- Main content goes here -->
</main>
