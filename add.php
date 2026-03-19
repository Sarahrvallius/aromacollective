<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//register information to database
require_once 'assets/functions/insert.php';
// inkluderar header
require_once 'assets/includes/header.php';
?>

<main class="bg-offwhite" class="container"> 

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

                    <h2 class="text-center mb-2 fw-bold text-red">Create Account</h2>
                    <p class="text-center text-muted mb-4">Join our fragrance community and start sharing your scent journey.</p>

                    <form action="add.php" method="POST">

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <label for="firstname" class="form-label small fw-bold text-uppercase">First name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="lastname" class="form-label small fw-bold text-uppercase">Last name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold text-uppercase">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
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


                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold text-uppercase">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                        </div>

                        <button type="submit" name="register" class="btn w-100 py-3 fw-bold text-uppercase text-white bg-red">
                            Create account
                        </button>

                    </form>

                    <div class="mt-4 text-center">
                        <p class="small mb-0 text-muted">Already a member?
                            <a href="signin.php" class="fw-bold text-decoration-none text-beige">Log in here.</a>
                        </p>
                    </div>

                </div>
            </div>

            <div class="text-center mt-4">
                <a href="index.php" class="text-muted small text-decoration-none">← Back to Aroma Collective</a>
            </div>

        </div>
    </div>

</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>