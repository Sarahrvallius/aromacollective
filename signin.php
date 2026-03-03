<?php
// inkluderar databasuppkoppling
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aroma Collective</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> <!-- Länk till CSS-fil -->
    <link rel="stylesheet" href="assets/css/all.min.css"> <!-- ikoner -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- vår egen css -->
</head>


<body class="bg-light">

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center py-5">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <h2 class="text-center mb-2 fw-bold" style="font-family: 'Bodoni Moda', serif; color: #7E1A01;">Welcome Back</h2>
                        <p class="text-center text-muted mb-4 small">Sign in to your Aromas Collective account</p>

                        <form action="process_login.php" method="POST">

                            <div class="mb-3">
                                <label for="email" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label small fw-bold text-uppercase" style="letter-spacing: 1px;">Password</label>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                            </div>

                            <button type="submit" class="btn w-100 py-3 fw-bold text-uppercase shadow-sm" style="background-color: #7E1A01; color: #F2F1EE; border-radius: 0; letter-spacing: 1px;">
                                Sign In
                            </button>

                        </form>

                        <div class="mt-4 text-center">
                            <p class="small mb-0 text-muted">New to the collective?
                                <a href="signup.php" class="fw-bold text-decoration-none" style="color: #AE9074;">Create account</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>