<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Aromas Collective</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Specifik CSS för About Us */
        .about-section {
            padding: 80px 0;
            background-color: var(--aromas-white);
            /* Er ljusa bakgrundsfärg */
        }

        .about-section h2 {
            color: var(--aromas-red);
            font-family: 'Bodoni Moda', serif;
            margin-bottom: 2rem;
            text-align: center;
        }

        .about-section p {
            color: #333;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .about-image {
            border: 1px solid var(--aromas-sand);
            /* Sandfärgad ram */
            padding: 10px;
            background-color: white;
            margin-bottom: 30px;
            /* Mellanrum under bilden på mobil */
        }

        .our-mission-box {
            background-color: #fcfcfc;
            /* Lite ljusare box */
            border-left: 5px solid var(--aromas-sand);
            /* Dekorativ linje */
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            font-style: italic;
            color: #555;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <main class="about-section">
        <div class="container">
            <h2 class="text-center mb-5">About Aromas Collective</h2>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="images/about-team.jpg" alt="Our Team" class="img-fluid about-image shadow-sm">
                </div>
                <div class="col-lg-6">
                    <p>We created Aromas Collective to bring fragrance lovers together in one dedicated space. We believe that choosing a perfume is more than just a purchase; it's a personal expression, a memory, and a journey of discovery.</p>
                    <p>Our platform is designed to be your trusted companion in this journey. Whether you're exploring timeless classics or seeking out the latest niche releases, you'll find a vibrant community ready to share insights and recommendations.</p>
                </div>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                    <img src="images/about-mission.jpg" alt="Our Mission" class="img-fluid about-image shadow-sm">
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="our-mission-box">
                        <h4 style="color: var(--aromas-red); font-family: 'Bodoni Moda', serif;">Our Mission is Simple:</h4>
                        <p>Make discovering new scents easier through honest reviews, thoughtful discussions, and shared experiences. We aim to cultivate a space where authenticity thrives, allowing every member to explore, learn, and truly belong.</p>
                    </div>
                    <p class="mt-4">Whether you're new to perfumes or a seasoned collector, you belong here. Our diverse community celebrates every preference, from delicate florals to bold ouds, ensuring there’s always something new to explore and discuss.</p>
                </div>
            </div>

            <div class="text-center mt-5">
                <h3 style="color: var(--aromas-red); font-family: 'Bodoni Moda', serif;">Join Our Story</h3>
                <p>Become a part of Aromas Collective and embark on your own unique fragrance journey. We can't wait to welcome you.</p>
                <a href="signup.php" class="btn btn-primary px-5 py-3" style="background-color: var(--aromas-red); border-radius: 0;">Sign Up Today</a>
            </div>

        </div>
    </main>

    <?php // include 'footer.php'; 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>