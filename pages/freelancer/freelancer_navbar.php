<nav class="navbar navbar-expand-lg" style="position: fixed;width:100%;top:0;z-index:1">
    <div class="container">
        <a class="navbar-brand" href="#">FindWork</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="freelancer_jobhunt.php">Job hunt</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Work
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="freelance_myworklist.php">My Work list</a></li>
                        <!-- <li><a class="dropdown-item" href="#">My Proposal list</a></li>
                        <li><a class="dropdown-item" href="#">Success work</a></li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="freelance_profile.php">Profile</a>
                </li>
            </ul>
            <div class="d-flex">
                <a role="button" class="side-link"> <a role="button" class="side-link">Hi, <?php echo $_SESSION['username'] ?></a>
                </a>
                <span class="separator">|</span>
                <a href="#" id="notification-toggle" class="side-link" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-bell"></i></a>
                <span class="separator">|</span>
                <a href="../logout.php" class="side-link">Sign out</a>
            </div>
        </div>
    </div>
</nav>