<?php include_once "api/jokes_AJAX.php" ?>
<?php require_once 'components/bootstrap.php' ?>
<nav class="navbar sticky-top d-flex flex-column navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Add Location</a>
                </li>
            </ul>

            <ul class="nav-item text-light">
                <li>
                    <div class="dropdown">

                        <!-- ### Dropdown-button for Everest-API-Output ### -->

                        <button class="btn btn-sm btn-secondary dropdown-toggle mt-2 me-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Everest Travels API</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="api/webservice.php?id=all">Example ?id=all</a></li>
                            <li><a class="dropdown-item" href="api/webservice.php?id=1">Example ?id=1</a></li>
                            <li><a class="dropdown-item" href="api/webservice.php?id=7">Example ?id=7</a></li>
                            <li><a class="dropdown-item" href="api/webservice.php?id=16">Example ?id=16</a></li>
                            <li><a class="dropdown-item" href="api/webservice.php?id=24">Example ?id=24</a></li>
                            <li><a class="dropdown-item" href="api/webservice.php?id=30">Example ?id=30</a></li>
                            <li><a class="dropdown-item" href="api/webservice.php?id=39">Example ?id=39</a></li>
                        </ul>

                        <!-- ### Partner-API-buttons & Joke-button ### -->

                        <button type="button" class="btn btn-sm btn-secondary mt-2 me-1"><a href="libquery.php">Partners: Books!</a></button>
                        <button type="button" class="btn btn-sm btn-secondary mt-2 me-1"><a href="petsquery.php">Partners: Pets!</a></button>
                        <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="funnyTask()">Joke!</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- ### Serri-Jokes-API-container - &nbsp for preventing collapse ### -->

    <div id="jokes" class="text-light border-top border-secondary pt-1 text-center">&nbsp;</div>
</nav>