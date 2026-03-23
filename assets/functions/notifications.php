<!-- SUCCESS OR ERROR MESSAGES when logging in/out -->


<?php
//includes database connection
require_once __DIR__ . '/../config/db.php';

//message if login successful
// check if an action is set
if (isset($_GET['action'])) {

    //check wich action is set
    switch ($_GET['action']) {
        case 'success':

            // display success message
            echo '<div class="alert alert-success text-center mb-0" role="alert">
                        You have successfully logged in!
                      </div>';
            break;

        case 'error':

            // display error message
            echo '<div class="alert alert-danger text-center mb-0" role="alert">
                        Incorrect email or password. Please try again.
                      </div>';
            break;

        case 'empty':

            // display error message
            echo '<div class="alert alert-warning text-center mb-0" role="alert">
                        Please fill in both email and password fields.
                      </div>';
            break;

        case 'logout':
            // display logout message
            echo '<div class="alert alert-info text-center mb-0" role="alert">
                        You have been logged out.
                      </div>';
            break;

        case 'account_created':
            // display account creation success message
            echo '<div class="alert alert-success text-center mb-0" role="alert">
                        Welcome! Your account has been created successfully.
                      </div>';
            break;
    }
}
?>