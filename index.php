<?php
// require_once 'assets/config/db.php'; // avkommentera när databasen funkar
require_once 'assets/includes/header.php'; // includes header
?>

<main>
    <?php //message if login successful
    // check if an action is set
    if (isset($_GET['action'])) {

        //check wich action is set
        switch ($_GET['action']) {
            case 'success':

                // display success message
                echo '<div class="alert alert-success text-center mb-0" role="alert">
                        You have successfully logged in!
                      </div>';
                break;

            case 'error':

                // display error message
                echo '<div class="alert alert-danger text-center mb-0" role="alert">
                        Incorrect email or password. Please try again.
                      </div>';
                break;

            case 'empty':

                // display error message
                echo '<div class="alert alert-warning text-center mb-0" role="alert">
                        Please fill in both email and password fields.
                      </div>';
                break;

            case 'logout':
                // display logout message
                echo '<div class="alert alert-info text-center mb-0" role="alert">
                        You have been logged out.
                      </div>';
                break;
        }
    }
    ?>

    <!-- HERO -->
    <section class="container-fluid px-0">
        <div class="hero position-relative">
            <div class="hero-image-placeholder d-flex align-items-center justify-content-center">
                <span class="placeholder-text">Hero image här</span>
            </div>

            <div class="hero-overlay">
                <div class="hero-card">
                    <p class="hero-small mb-2">Your signature scent starts here.</p>
                    <p class="hero-small mb-3">Join a community built for fragrance lovers</p>
                    <a href="add.php" class="btn btn-outline-light px-4">Join the Community</a>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="bg-offwhite py-5">
        <div class="container">
            <div class="row align-items-start gy-4">
                <div class="col-lg-3">
                    <h2 class="section-title mb-3">How it works</h2>
                    <p class="section-text">
                        Discover new scents, share your experiences, and connect with people
                        who understand the power of signature fragrance.
                    </p>
                </div>

                <div class="col-lg-9">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <div class="how-step">
                                <div class="how-icon">1</div>
                                <p>Create your profile</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="how-step">
                                <div class="how-icon">2</div>
                                <p>Explore the Fragrance Library</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="how-step">
                                <div class="how-icon">3</div>
                                <p>Review &amp; connect with the community</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <a href="add.php" class="btn btn-outline-dark btn-sm">Create your profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRENDING -->
    <section class="trending-section py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-3">
                    <h2 class="section-title text-white mb-3">Trending this week</h2>
                    <p class="section-text text-white-50">
                        Discover the most talked-about fragrance right now.
                    </p>
                </div>

                <div class="col-lg-9">
                    <div class="row text-center gy-4">
                        <div class="col-md-4">
                            <div class="product-placeholder d-flex align-items-center justify-content-center">
                                <span class="placeholder-text-dark">Bild 1</span>
                            </div>
                            <p class="product-name">HELMUT LANG</p>
                        </div>

                        <div class="col-md-4">
                            <div class="product-placeholder d-flex align-items-center justify-content-center">
                                <span class="placeholder-text-dark">Bild 2</span>
                            </div>
                            <p class="product-name">WHITE FOREST</p>
                        </div>

                        <div class="col-md-4">
                            <div class="product-placeholder d-flex align-items-center justify-content-center">
                                <span class="placeholder-text-dark">Bild 3</span>
                            </div>
                            <p class="product-name">FEMALE CHRIST</p>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <a href="library.php" class="trending-link">View all trending fragrances →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COMMUNITY -->
    <section class="community-section">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-lg-6 community-left">
                    <div class="community-content">
                        <h2 class="community-title">Community Voices</h2>
                        <div class="community-line mb-5"></div>

                        <blockquote class="community-quote">
                            “I’ve discovered more new favorites here than anywhere else.
                            The reviews are detailed, honest, and actually helpful –
                            it feels like getting recommendations from friends who truly know perfume.”
                        </blockquote>

                        <p class="community-meta">— Sofia, member since 2025</p>

                        <div class="quote-dots mt-5">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="community-image-placeholder d-flex align-items-center justify-content-center">
                        <span class="placeholder-text">Porträttbild här</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
require_once 'assets/includes/footer.php';
?>