<?php
require_once 'assets/config/db.php'; // inkluderar databasuppkoppling
require_once 'assets/includes/header.php'; //includes header
?>

<main class="bg-offwhite">
    <!-- Hero section-->
    <section class="pt-4 pb-0 bg-beige">
        <div class="container-fluid">
            <div class="row align-items-center g-3">
                <div class="col-12 col-md-6 align-self-end pb-0">
                    <img src="assets/images/aboutus-header.webp" alt="Woman posing with face covered in lace and butterflies" class="img-size mb-0 d-block ms-auto">
                </div>
                <div class="col-12 col-md-6 px-5 d-flex align-items-center">
                    <div class="w-100 ps-3 pe-4 mt-5 pt-5">
                        <h2 class="text-white fw-normal lh-base fs-6 mb-4">Your signature scent starts here.<br>Join a community built for fragrance lovers</h2>
                        <a href="add.php" class="btn btn-outline-light px-4 py-3 rounded-2 fw-semibold">Join the Community</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro paragraph-->
    <section>
        <div class="container p-5">
            <p class="font-heading fs-5 pt-5 pb-5">
                Aroma Collective was founded to bring perfume lovers
                together in one vibrant, shared space. Our mission
                is to celebrate scent as a form of storytelling—helping
                people discover fragrances, exchange honest reviews,
                and build a community shaped by curiosity, creativity,
                and the joy of finding a scent that truly resonates.</p>
        </div>
    </section>

    <!-- Info section-->
    <section class="bg-red">
        <div class="row g-0 m-0">
            <div class="col-6 text-white d-flex flex-column align-items-start pt-5 ps-5">
                <div class="container p-5 mt-5">
                    <h2 class="fs-3 mb-4">Our Mission</h2>
                    <p class="fs-6 pe-5">
                        Aroma Collective was created with a simple belief:
                        fragrance becomes more meaningful when it's shared.
                        We set out to build a social platform where perfume
                        enthusiasts—from curious beginners to seasoned collectors—
                        can explore, review, and discuss scents in an open,
                        welcoming environment. Our mission is to make the world
                        of fragrance more accessible, transparent, and community-driven.</p>
                    <p class="fs-6 pe-5">
                        Here, every rating, story, and recommendation helps others
                        navigate the vast landscape of perfumery. Aroma Collective
                        exists to connect people through scent, spark discovery,
                        and celebrate the artistry behind every bottle.</p>
                    <p class="fs-6 pe-5 mb-5">
                        Join the Collective today and add your voice to a growing
                        community of scent lovers. Create your profile,
                        share your impressions, and help shape the world of fragrance.</p>
                    <p class="font-heading fs-5 pe-5 pt-3 pb-1">
                        Just interested in finding a new favorite?</p>
                    <a href="library.php" class="btn btn-outline-light px-4 py-3 rounded-2 fw-semibold">Explore the Library</a>
                </div>
            </div>
            
            <!-- Image Carousel -->
            <div class="col-6 p-0">
                <div id="aboutInfoCarousel" class="carousel slide">
                    <div class="carousel-indicators mb-2">
                        <button type="button" data-bs-target="#aboutInfoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#aboutInfoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#aboutInfoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner about-silhouette-ratio">
                        <div class="carousel-item active h-100">
                            <img src="assets/images/aboutus-man.webp" alt="Close-up of a mans face, partly hidden behind a sheer curtain." class="d-block w-100 h-100 img-cover">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="assets/images/aboutus-hair.webp" alt="Close-up portrait from behind with dramatic, curly hair and warm lighting." class="d-block w-100 h-100 img-cover">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="assets/images/aboutus-silhouette.webp" alt="Silhouette of woman standing under an arch of old architecture, throwing a billowing fabric in the air." class="d-block w-100 h-100 img-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote over image -->
    <section class="position-relative mt-5 pt-5">
        <img src="assets/images/aboutus-quote.webp" alt="Woman staring into camera with a barren landscape in the background." class="w-100 img-cover d-block">
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-4 w-100">
            <p class="font-heading fs-2 mt-5 mb-2">"Fragrance is one of the few art forms we carry with us.<br>
                Memory, emotion, and identity in one breath."</p>
            <p>— Sofia, founder of Aroma Collective.</p>
        </div>
    </section>
</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>