<header>
        <nav>
                <ul>
                        <li>
                                <form action="/">
                                <button>Grāmatas</button>
                                </form>
                        </li>

                        <li>
                                <form action="./borrowed">
                                <button>Aizņemtās</button>
                                </form>
                        </li>

                        <?php if (isset($_SESSION["admin"])) { ?>
                                <li>
                                        <form action="./create">
                                                <button>Pievieno</button>
                                        </form>
                                </li>
                        <?php } ?>
                        
                        <!--
                        <li>
                                <form action="./logout" method="POST" >
                                <button class="buttonDanger">Logout</button>
                                </form>
                        </li>
                        -->

                        <li>
                                <form action="./profile">
                                <button>Tavs profils</button>
                                </form>
                        </li>
                </ul>
        </nav>
</header>

                        </br></br>