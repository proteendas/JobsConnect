<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <img src="img/jobsConnect.svg" style="width:33px;" alt="">
        <h1 class="m-0 text-primary">JobsConnect</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="index.php#category" class="nav-item nav-link">Category</a>
            <a href="index.php#about" class="nav-item nav-link">About</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
        </div>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['login_admin'])) {
            $myusername = $_SESSION['login_admin'];
            echo '<a href="adminAccount.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">VIEW ACCOUNT<i class="fa fa-arrow-right ms-3"></i></a>';
        } elseif (isset($_SESSION['login_user'])) {
            $myusername = $_SESSION['login_user'];
            echo '<a href="jobs.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">VIEW JOBS<i class="fa fa-arrow-right ms-3"></i></a>';
        } else {
            echo '<a href="jobs.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">GO TO PORTAL<i class="fa fa-arrow-right ms-3"></i></a>';
        }
        ?>
    </div>
</nav>
<!-- Navbar End -->