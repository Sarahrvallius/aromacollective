<?php
//init session management, måste vara överst!
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//procces loginform
require_once 'assets/functions/session.login.php';

// to determine which nav link is active
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isAboutActive = $currentPage === 'about.php';
$isPerfumesActive = in_array($currentPage, ['library.php', 'perfumes.php'], true);
$isProfileActive = $currentPage === 'profile.php';
$isSigninActive = $currentPage === 'signin.php';
?>

<head>
    <meta charset="utf-8">
    <title>Aroma Collective</title>
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
    <nav class="navbar navbar-expand-lg bg-offwhite">
        <div class="container py-2">
            <a class="navbar-brand fw-semibold library-brand" href="index.php">Aroma Collective</a>

            <div class="ms-auto d-flex gap-3">
                <a class="text-decoration-none text-dark<?php echo $isAboutActive ? ' fw-semibold' : ''; ?>" href="about.php">About us</a>
                <a class="text-decoration-none text-dark<?php echo $isPerfumesActive ? ' fw-semibold' : ''; ?>" href="library.php">Perfumes</a>
                <!-- check if user is logged in, if so show profile and logout, if not show login -->
                <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { ?>
                    <a class="text-decoration-none text-dark<?php echo $isProfileActive ? ' fw-semibold' : ''; ?>" href="profile.php">
                        <i class="fa-solid fa-user me-1" aria-hidden="true"></i>Profile
                    </a>
                    <a class="text-decoration-none text-dark" href="assets/functions/logout.php">Log out</a>
                <?php } else { ?>
                    <a class="text-decoration-none text-dark<?php echo $isSigninActive ? ' fw-semibold' : ''; ?>" href="signin.php">
                        <i class="fa-solid fa-user me-1" aria-hidden="true"></i>Log in
                    </a>
                <?php } ?>
            </div>
        </div>
    </nav>