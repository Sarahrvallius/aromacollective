PHP
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Aromas Collective | Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@400;700&display=swap" rel="stylesheet">
    </head>

<body>
    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signUpModalLabel">Join the Community</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="process_signup.php" method="POST">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First name" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last name" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="signUpEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="signUpEmail" name="email" placeholder="email@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="signUpPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signUpPassword" name="password" placeholder="Create a password" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100 py-2">Create account</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <p class="small text-muted">By joining, you agree to our Terms of Service.</p>
            </div>
        </div>
    </div>
</div>
</body>


</html>