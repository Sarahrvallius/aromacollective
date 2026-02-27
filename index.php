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

<style>
    /* Specifik CSS för index-sidan */
    .hero-section {
        position: relative;
        padding: 120px 0;
        min-height: 75vh;
        background-image: url('images/hero-bg.jpg');
        /* Lägg till din bild här */
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(242, 241, 238, 0.8);
        /* Er färg #F2F1EE med transparens */
        z-index: 1;
    }

    .section-title {
        color: #7E1A01;
        font-family: 'Bodoni Moda', serif;
        margin-bottom: 3rem;
    }

    .step-number {
        font-size: 3rem;
        color: #AE9074;
        opacity: 0.5;
        font-family: 'Bodoni Moda', serif;
    }

    .card-custom {
        border: none;
        background-color: #fff;
        transition: transform 0.3s;
    }

    .card-custom:hover {
        transform: translateY(-5px);
    }
</style>

<body>
    <?php include 'includes/header.php'; ?> <!-- Inkluderar header -->

    <header class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container position-relative" style="z-index: 2;">
            <div class="row">
                <div class="col-lg-6">
                    <h1 style="color: #7E1A01; font-size: 2.8rem;">Discover. Review. <br>Share your signature scent.</h1>
                    <p class="my-4" style="font-size: 1.1rem; max-width: 500px;">A global community for fragrance lovers. Explore perfumes, write reviews, and connect with people who share your passion for scent.</p>
                    <a href="signup.php" class="btn btn-primary px-4 py-2" style="background-color: #7E1A01; border-radius: 0;">Join the Community</a>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5" style="background-color: #F2F1EE;">
        <div class="container py-5">
            <h2 class="text-center section-title">How It Works</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="step-number">1</div>
                    <h4 style="font-family: 'Bodoni Moda';">Create Your Profile</h4>
                    <p class="text-muted small">Sign up for free and build your personal scent identity.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="step-number">2</div>
                    <h4 style="font-family: 'Bodoni Moda';">Explore the Library</h4>
                    <p class="text-muted small">Browse perfumes by brand, notes, popularity, or rating.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="step-number">3</div>
                    <h4 style="font-family: 'Bodoni Moda';">Review & Connect</h4>
                    <p class="text-muted small">Share your thoughts, rate fragrances, and join the discussion.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-5 text-center">
            <h2 class="section-title">Trending This Week</h2>
            <p class="mb-5">Discover the most talked-about fragrances right now.</p>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card card-custom p-4 shadow-sm">
                        <img src="images/perfume1.jpg" class="img-fluid mb-3" alt="Perfume">
                        <h5 style="font-family: 'Bodoni Moda';">Elegance No. 5</h5>
                        <p class="text-muted">Luxury Brand</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-custom p-4 shadow-sm">
                        <img src="images/perfume2.jpg" class="img-fluid mb-3" alt="Perfume">
                        <h5 style="font-family: 'Bodoni Moda';">Midnight Oak</h5>
                        <p class="text-muted">Artisan Scents</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-custom p-4 shadow-sm">
                        <img src="images/perfume3.jpg" class="img-fluid mb-3" alt="Perfume">
                        <h5 style="font-family: 'Bodoni Moda';">Summer Breeze</h5>
                        <p class="text-muted">Oceanic Vibes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #AE9074; color: white;">
        <div class="container text-center">
            <h2 class="section-title text-white">Community Voices</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p class="fst-italic">"I’ve discovered more new favorites here than anywhere else."</p>
                </div>
                <div class="col-md-6 mb-4">
                    <p class="fst-italic">"Finally, a space made for true fragrance lovers."</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?> <!-- Inkluderar footer -->

</body>

</html>