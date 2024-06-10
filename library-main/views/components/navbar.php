<header>
        <nav>
                <ul>
                        <li>
                                <form action="/">
                                <button>Books</button>
                                </form>
                        </li>

                        <li>
                                <form action="./borrowed">
                                <button>Borrowed</button>
                                </form>
                        </li>

                        <?php if (isset($_SESSION["admin"])) { ?>
                                <li>
                                        <form action="./create">
                                                <button>Create</button>
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
                                <button>Your profile</button>
                                </form>
                        </li>
                </ul>
        </nav>
</header>

                        </br></br>