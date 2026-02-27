<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aroma Collective</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> <!-- Länk till CSS-fil -->
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #F2F1EE; border-bottom: 2px solid #AE9074; padding: 1rem 0;">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="font-family: 'Bodoni Moda', serif; color: #7E1A01; font-weight: 800; letter-spacing: 2px; font-size: 1.5rem;">
                AROMA COLLECTIVE hihih
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center" style="font-family: 'Bodoni Moda', serif; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="index.php" style="color: #333;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="library.php" style="color: #333;">Perfumes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="about.php" style="color: #333;">About Us</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a href="signup.php" class="btn px-4" style="background-color: #7E1A01; color: #F2F1EE; border-radius: 0; font-weight: bold; transition: 0.3s;">
                            Join Us
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        /* Små extrajusteringar för att få det att kännas lyxigt */
        .nav-link {
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #AE9074 !important;
            /* Sandfärgad vid hover */
        }

        .navbar-toggler:focus {
            box-shadow: none;
            /* Tar bort den fula blå ramen vid klick */
        }
    </style>

</body>

</html>