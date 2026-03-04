<?php
require_once 'assets/config/db.php'; // inkluderar databasuppkoppling
require_once 'assets/includes/header.php'; //includes header
?>

<main>
    <p> Här skriver vi html-kodning för index-sidan. </p>
    <il>
        <ul> <a href="signup.php">Join us</a> </ul> <!-- link to sign up page -->
        <ul> <a href="signin.php">Sign in</a> </ul> <!-- link to regerstration page -->
        <ul> <a href="library.php"> Parfumes </a> </ul> <!-- link to library page -->
        <ul> <a href="about.php">About us</a> </ul> <!-- link to about page -->
        <ul> <a href="profile.php">Profile</a> </ul> <!-- link to profile -->
    </il>
</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>