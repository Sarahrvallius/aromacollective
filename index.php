<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
// inkluderar header
require_once 'assets/includes/header.php';
?>

<main>
    <?php //message if account created successfully
    // check if an action is set
    if (isset($_GET['action'])) {

        //check wich action is set
        switch ($_GET['action']) {
            case 'deleted':

                // display success message
                echo '<div class="alert alert-success text-center" role="alert">
                        Account deleted successfully!
                      </div>';
                break;
        }
    }
    ?>

    <p> Här skriver vi html-kodning för index-sidan. </p>
    <il>
        <ul> <a href="add.php">Join us</a> </ul> <!-- link to sign up page -->
        <ul> <a href="signin.php">Sign in</a> </ul> <!-- link to regerstration page -->
        <ul> <a href="library.php"> Parfumes </a> </ul> <!-- link to library page -->
        <ul> <a href="about.php">About us</a> </ul> <!-- link to about page -->
        <ul> <a href="profile.php">Profile</a> </ul> <!-- link to profile -->
        <ul> <a href="view.php">admin</a> </ul> <!-- link to admin/delete/add -->
    </il>
</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>