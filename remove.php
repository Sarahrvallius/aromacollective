<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//Delete information in database
require_once 'assets/functions/delete.php';
//Specifik information about user 
require_once 'assets/functions/select-id.php';
// inkluderar header
require_once 'assets/includes/header.php';
?>

<main class="bg-light" class="container">


    <div class="row min-vh-100 justify-content-center align-items-center py-5">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">

                    <h2 class="text-center mb-2 fw-bold" style="font-family: 'Bodoni Moda', serif; color: #7E1A01;">Update Account</h2>
                    <p class="text-center text-muted mb-4">Modify your account information below</p>

                    <form action="remove.php" method="POST">

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <p>Are you sure you want to delete your account?</p>
                                <p><?php echo ucwords($row['firstname']) . ' ' . ucwords($row['lastname']); ?></p>
                            </div>

                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <button type="submit" name="delete" class="btn w-100 py-3 fw-bold text-uppercase" style="background-color: #7E1A01; color: #F2F1EE; border-radius: 0;">
                            <i class="fa-solid fa-trash-can"></i>
                            Delete account
                        </button>

                    </form>


                </div>
            </div>

            <div class="text-center mt-4">
                <a href="view.php" class="text-muted small text-decoration-none"> ← Back to users</a>
            </div>

        </div>
    </div>

</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>