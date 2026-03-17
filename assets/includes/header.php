<?php
//init session management, måste vara överst!
session_start();

// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//procces loginform
require_once 'assets/functions/session.login.php';
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
    <nav>
        <ul>


            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="library.php">Perfumes</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="add.php">Sign up</a></li>

            <?php
            // Check if user is logged in           
            if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                // If logged in, show logout link, Lägg in log out länken här nedan
                echo '<li><a href="assets/functions/logout.php">Log out</a></li>';
            } else {
                // If not logged in, show login link
                echo '<li><a href="signin.php">Log in</a></li>';
            }
            ?>
        </ul>
    </nav>