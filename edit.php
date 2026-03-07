<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//Update information in database
require_once 'assets/functions/update.php';
//Specifik information about user 
require_once 'assets/functions/select-id.php';
// inkluderar header
require_once 'assets/includes/header.php';
?>

<main class="bg-light" class="container">

    <?php //message if account created successfully
    // check if an action is set
    if (isset($_GET['action'])) {

        //check wich action is set
        switch ($_GET['action']) {
            case 'success':

                // display success message
                echo '<div class="alert alert-success text-center" role="alert">
                        Account created successfully! You can now <a href="signin.php" class="alert-link">log in</a>.
                      </div>';
                break;
        }
    }
    ?>

    <div class="row min-vh-100 justify-content-center align-items-center py-5">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">

                    <h2 class="text-center mb-2 fw-bold" style="font-family: 'Bodoni Moda', serif; color: #7E1A01;">Update Account</h2>
                    <p class="text-center text-muted mb-4">Modify your account information below</p>

                    <form action="edit.php" method="POST">

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <label for="firstname" class="form-label small fw-bold text-uppercase">First name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required value=<?php echo $row['firstname']; ?>>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="lastname" class="form-label small fw-bold text-uppercase">Last name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required value=<?php echo $row['lastname']; ?>>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold text-uppercase">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required value=<?php echo $row['email']; ?>>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label small fw-bold text-uppercase">Gender (optional)</label>
                            <select class="form-select" id="gender" name="gender">
                                <option selected disabled>Choose...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="non-binary">Non-binary</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <button type="submit" name="modify" class="btn w-100 py-3 fw-bold text-uppercase" style="background-color: #7E1A01; color: #F2F1EE; border-radius: 0;">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Update account
                        </button>

                    </form>


                </div>
            </div>

            <div class="text-center mt-4">
                <a href="index.php" class="text-muted small text-decoration-none"> ← Back to Aroma Collective</a>
            </div>

        </div>
    </div>

</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>