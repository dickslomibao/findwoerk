<nav class="navbar navbar-expand-lg" style="position: fixed;width:100%;top:0;z-index:1">
    <div class="container">
        <a class="navbar-brand" href="#">FindWork</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="client_home.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Jobs
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="client_jobs.php">My Ongoing jobs</a></li>
                        <li><a class="dropdown-item" href="client_started_jobs.php">Started Jobs</a></li>
                        <li><a class="dropdown-item" href="client_createjob.php">Create a Job</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>

            </ul>


            <div class="d-flex" style="align-items: center;">
                <a role="button" class="side-link">Hi, <?php echo $_SESSION['username']?></a>
                <span class="separator">|</span>
                <a role="button" id="notification-toggle" class="side-link"><i class="fa-solid fa-bell"></i></a>
                <span class="separator">|</span>
                <a href="../logout.php" class="side-link">Sign out</a>
            </div>

        </div>
    </div>
</nav>