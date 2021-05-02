<body>
    <div class="container-fluid mx-auto pt-0 px-5">
        <div class="wrapSideOut mx-lg-5">
            <div class="wrapSideIn mx-lg-5">
                <div class="wrapHero m-4 mt-0 mb-0">
                    <div class="outerRimNav">
                        <div class="innerRimNav">
                            <div id="groundNav">
                                <div id="borderMain">
                                    <nav class="navbar navbar-expand-md navbar-light">
                                        <div class="container-fluid">
                                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                                                <!-- ### Navbar-links begin here ### -->

                                                <div class="navbar-nav">
                                                    <a class="nav-link active" aria-current="page" href="index.php"><button class='btn btn-dark' type='button'>Home</button></a>
                                                    <a class="nav-link" href="senior.php"><button class='btn btn-dark' type='button'>Seniors</button></a>
                                                    <a class="nav-link" href="adoptions.php"><button class='btn btn-dark' type='button'>Adoptions</button></a>
                                                    <a class="nav-link" href="update.php?id=<?php echo $_SESSION['user'] ?>"><button class='btn btn-dark' type='button'>Profile</button></a>
                                                    <a class="nav-link" href="logout.php?logout"><button class='btn btn-dark' type='button'>Sign out</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>