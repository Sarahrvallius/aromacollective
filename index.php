<?php
// require_once 'assets/config/db.php'; // avkommentera när databasen funkar
require_once 'assets/includes/header.php'; // includes header
require_once 'assets/functions/select-top-perfumes.php';
?>

<!-- SUCCESS OR ERROR MESSAGES when logging in -->
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

<main class="bg-offwhite">
    <!-- Hero section-->
    <section class="index-hero-section">
        <div class="container-fluid h-100 px-0">
            <div class="row align-items-center g-0 h-100">
                <div class="col-12 col-md-6"></div>
                <div class="col-12 col-md-6 px-5 d-flex align-items-center">
                    <div class="w-100 ps-3 pe-4 mt-5 pt-5">
                        <h2 class="text-white fw-normal lh-base fs-6 mt-4 mb-4">Finding your signature scent starts here.<br>Join a community built for fragrance lovers</h2>
                        <a href="add.php" class="btn btn-outline-light px-4 py-3 rounded-2 fw-semibold">Join the Community</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-start gy-5">
                <div class="col-md-4">
                    <h2 class="fs-2 mb-3">How it works</h2>
                    <p class="text-muted">
                        Discover new scents, share your experiences, and connect with people
                        who understand the power of signature fragrance.
                    </p>
                </div>
                <!-- 3 steps with icons -->
                <div class="col-md-8 pt-5">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="fa-regular fa-circle-user fs-4"></i>
                                <p class="mb-0">Create your profile</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="fa-solid fa-magnifying-glass fs-4"></i>
                                <p class="mb-0">Explore the Fragrance Library</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="fa-regular fa-comments fs-4"></i>
                                <p class="mb-0">Review & connect with the community</p>
                            </div>
                        </div>
                    </div>
                    <!-- Button to create profile -->
                    <div class="text-end mt-5 me-1 p-2">
                        <a href="add.php" class="btn btn-outline-dark btn-sm p-2">Create your profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRENDING -->
    <section class="bg-red py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-3">
                    <h2 class="fs-2 text-white mb-3">Trending this week</h2>
                    <p class="text-white-50">
                        Discover the most talked-about fragrance right now.
                    </p>
                </div>

                <!-- 3 most popular perfumes -->
                <div class="col-lg-9">
                    <div class="row text-center gy-4">
                        <!-- Loop through perfumes with highest rating and display them -->
                        <?php
                        foreach ($topPerfumes as $perfume) {
                            echo '<div class="col-md-4">';
                            echo '<a href="perfumes.php?perfume=' . $perfume['slug'] . '" class="perfume-card d-block text-decoration-none">';
                            echo '<img src="' . $perfume['image'] . '" alt="' . $perfume['name'] . '" class="perfume-image img-fluid w-100 d-block">';
                            echo '<p class="text-white mt mb-0 text-uppercase">' . $perfume['name'] . '</p>';
                            echo '</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <!-- Link to library -->
                    <div class="text-end mt-5 pt-4">
                        <a href="library.php" class="text-decoration-none text-white">View all trending fragrances →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COMMUNITY -->
    <section>
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="p-5 mt-5">
                        <h2 class="fs-1">Community Voices</h2>
                        <div class="border-top border-1 border-dark w-75 mb-4"></div>

                        <!-- Carousel with 3 reviews from users -->
                        <div id="communityVoicesCarousel" class="carousel carousel-dark slide" data-bs-ride="false" data-bs-interval="false">
                            <div class="carousel-inner community-carousel-inner">
                                <div class="carousel-item active">
                                    <blockquote class="font-heading fs-4 mt-4">
                                        “I've discovered more new favorites here than anywhere else.
                                        The reviews are detailed, honest, and actually helpful -
                                        it feels like getting recommendations from friends who truly know perfume.”
                                    </blockquote>
                                    <p class="pt-3 text-muted">- Sofia, member since 2025</p>
                                </div>

                                <div class="carousel-item">
                                    <blockquote class="font-heading fs-4 mt-4">
                                        “I thought I already knew what I liked, but this community
                                        made me try notes I usually avoided. Now I have two new favorites
                                        in my weekly rotation.”
                                    </blockquote>
                                    <p class="pt-3 text-muted">- Elias, member since 2024</p>
                                </div>

                                <div class="carousel-item">
                                    <blockquote class="font-heading fs-4 mt-4">
                                        “The reviews are short, clear, and actually useful.
                                        I can compare scents quickly and still get enough detail
                                        to decide what to test next.”
                                    </blockquote>
                                    <p class="pt-3 text-muted">- Mira, member since 2023</p>
                                </div>
                            </div>

                            <div class="carousel-indicators position-static justify-content-center pt-4 mt-5 mb-0">
                                <button type="button" data-bs-target="#communityVoicesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#communityVoicesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#communityVoicesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Image -->
                <div class="col-md-6">
                    <img src="assets/images/index-community.jpg" alt="Black and white portrait of fashionable woman." class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</main>

<?php
require_once 'assets/includes/footer.php';
?>