PHP
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Aromas Collective | Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --aromas-red: #7E1A01;
            --aromas-sand: #AE9074;
            --aromas-white: #F2F1EE;
        }

        body {
            background-color: var(--aromas-white);
            font-family: 'Bodoni Moda', serif;
        }

        .signup-container {
            max-width: 500px;
            margin: 80px auto;
            background: white;
            padding: 40px;
            border: 1px solid var(--aromas-sand);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            color: var(--aromas-red);
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .form-control,
        .form-select {
            border-radius: 0;
            border: 1px solid #ddd;
            padding: 12px;
            font-family: sans-serif;
            /* Enklare typsnitt för inmatning är mer lättläst */
        }

        .form-control:focus {
            border-color: var(--aromas-sand);
            box-shadow: none;
        }

        .btn-signup {
            background-color: var(--aromas-red);
            color: white;
            border-radius: 0;
            padding: 15px;
            width: 100%;
            border: none;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            margin-top: 20px;
            transition: 0.3s;
        }

        .btn-signup:hover {
            background-color: var(--aromas-sand);
            color: white;
        }

        h2 {
            color: var(--aromas-red);
            text-align: center;
            margin-bottom: 10px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .login-link a {
            color: var(--aromas-sand);
            text-decoration: none;
        }
    </style>
</head>


<body>

    <?php // include 'header.php'; 
    ?>

    <div class="container">
        <div class="signup-container">
            <h2>Create Your Account</h2>
            <p class="text-center text-muted mb-4 small">Join our fragrance community and start sharing your scent journey.</p>

            <form action="process_signup.php" method="POST">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender (optional)</label>
                    <select name="gender" class="form-select">
                        <option value="">Select gender</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="non-binary">Non-binary</option>
                        <option value="prefer-not-to-say">Prefer not to say</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-signup">Create Account</button>

                <div class="login-link">
                    Already a member? <a href="login.php">Log in here.</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>