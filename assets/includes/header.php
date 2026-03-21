<?php
//init session management, must be first!
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//process login form
require_once 'assets/functions/session.login.php';

// to determine which nav link is active
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isHomeActive = $currentPage === 'index.php';
$isAboutActive = $currentPage === 'about.php';
$isPerfumesActive = in_array($currentPage, ['library.php', 'perfumes.php'], true);
$isProfileActive = $currentPage === 'profile.php';
$isSigninActive = $currentPage === 'signin.php';
$isSignupActive = $currentPage === 'add.php';
?>

<head>
    <meta charset="utf-8">
    <title>Aroma Collective</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-offwhite border-bottom">
        <div class="container py-2">
            <!-- icon -->
            <a class="navbar-brand me-2" href="index.php">
                <i class="fa-solid fa-spray-can-sparkles"></i>
            </a>
            <!-- brand name -->
            <a class="navbar-brand fw-semibold font-heading" href="index.php">Aroma Collective</a>

            <!-- nav links with active state bold -->
            <div class="ms-auto d-flex align-items-center gap-3">
                <a class="text-decoration-none me-1 <?php echo $isHomeActive ? 'text-red fw-semibold' : 'text-dark'; ?>" href="index.php">Home</a>
                <a class="text-decoration-none me-1 <?php echo $isAboutActive ? 'text-red fw-semibold' : 'text-dark'; ?>" href="about.php">About us</a>
                <a class="text-decoration-none me-5 <?php echo $isPerfumesActive ? 'text-red fw-semibold' : 'text-dark'; ?>" href="library.php">Perfumes</a>

                <!-- check if user is logged in, if so show profile and logout, if not show login -->
                <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { ?>
                    <div class="dropdown profile-hover-dropdown me-3">
                        <a class="text-decoration-none dropdown-toggle d-inline-flex align-items-center py-2 px-1 <?php echo $isProfileActive ? 'text-red fw-semibold' : 'text-dark'; ?>" href="profile.php" role="button">
                            <i class="fa-solid fa-user me-1" aria-hidden="true"></i>Profile
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item mb-0" href="#">Ratings</a> <!-- Not functional -->
                            <a class="dropdown-item mb-0" href="#">Reviews</a> <!-- Not functional -->
                            <a class="dropdown-item mb-0" href="#">Settings</a> <!-- Not functional -->
                            <a class="dropdown-item" href="assets/functions/logout.php">Log out</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a class="text-decoration-none me-1 <?php echo $isSigninActive ? 'text-red fw-semibold' : 'text-dark'; ?>" href="signin.php">
                        <i class="fa-solid fa-user me-1"></i>Log in
                    </a>
                    <a class="text-decoration-none <?php echo $isSignupActive ? 'text-red fw-semibold' : 'text-dark'; ?>" href="add.php">
                        <i class="fa-solid fa-circle-plus me-1"></i>Sign up
                    </a>
                <?php } ?>
            </div>
        </div>
    </nav>