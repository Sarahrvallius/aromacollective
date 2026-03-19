<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// inkluderar header
require_once 'assets/includes/header.php';
//includes database connection
require_once 'assets/config/db.php';
?>


<main class="bg-offwhite">

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center py-5">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <h2 class="text-center mb-2 fw-bold text-red">Welcome Back</h2>
                        <p class="text-center text-muted mb-4 small">Sign in to your Aroma Collective account</p>

                        <form action="index.php" method="post">

                            <div class="mb-3">
                                <label for="email" class="form-label small fw-bold text-uppercase">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label small fw-bold text-uppercase">Password</label>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                            </div>

                            <button type="submit" name="login" class="btn w-100 py-3 fw-bold text-uppercase shadow-sm text-white bg-red">
                                Sign In
                            </button>

                        </form>

                        <div class="mt-4 text-center">
                            <p class="small mb-0 text-muted">New to the collective?
                                <a href="add.php" class="fw-bold text-decoration-none text-beige">Create account</a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="index.php" class="text-muted small text-decoration-none">← Back to Home</a>
                </div>

            </div>
        </div>
    </div>

</main>


<?php
require_once 'assets/includes/footer.php'; //includes footer
?>