<?php
// inkluderar databasuppkoppling
require_once 'db.php';
?>



<main class="bg-light">

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center py-5">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <h2 class="text-center mb-2 fw-bold" style="font-family: 'Bodoni Moda', serif; color: #7E1A01;">Create Account</h2>
                        <p class="text-center text-muted mb-4">Join our fragrance community and start sharing your scent journey.</p>

                        <form action="process_signup.php" method="POST">

                            <div class="row g-3 mb-3">
                                <div class="col-12 col-md-6">
                                    <label for="firstName" class="form-label small fw-bold text-uppercase">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="John" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="lastName" class="form-label small fw-bold text-uppercase">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Doe" required>
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

                            <button type="submit" class="btn w-100 py-3 fw-bold text-uppercase" style="background-color: #7E1A01; color: #F2F1EE; border-radius: 0;">
                                Create account
                            </button>

                        </form>

                        <div class="mt-4 text-center">
                            <p class="small mb-0 text-muted">Already a member?
                                <a href="signin.php" class="fw-bold text-decoration-none" style="color: #AE9074;">Log in here.</a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="index.php" class="text-muted small text-decoration-none">← Back to Aromas Collective</a>
                </div>

            </div>
        </div>
    </div>

</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>