<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// inkluderar header
require_once 'assets/includes/header.php';
//includes database connection
require_once 'assets/config/db.php';
?>

<body>
    <main>
        <!--Profile section-->
        <section class="bg-offwhite py-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Profile Image-->
                    <div class="col-3 offset-1 text-center me-5">
                        <img src="assets/images/profiletemporary.png" alt="Profile" class="rounded-circle img-fluid mb-3 profile-img">
                        <!--Edit profile link-->
                        <a href="#" class="text-dark text-decoration-none d-block">
                            <i class="fa-regular fa-pen-to-square me-2"></i>Edit profile
                        </a>
                    </div>

                    <!-- Profile name, info, bio -->
                    <div class="col-7 ps-5">
                        <div class="d-flex gap-5 align-items-start mb-2">
                            <h1 class="display-5 mb-0">Jane Doe</h1>
                            <div class="text-end mt-1">
                                <p class="mb-0"><strong>23</strong> Ratings</p>
                                <p class="mb-0"><strong>6</strong> Reviews</p>
                            </div>
                        </div>
                        <p class="mb-3">29 years. She/her.</p>
                        <p class="text-secondary profile-bio">
                            Hey, I'm Jane! I enjoy trying new scents and seeing how they actually wear day to day. I share quick, honest impressions and love hearing what others are into.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!--Favorites section (highly rated by user)-->
        <section class="bg-beige py-5">
            <div class="container">
                <!-- Title with underline -->
                <h2 class="fs-4 ms-4 mb-2">Favorites</h2>
                <div class="border-top border-1 border-dark w-50 mb-4"></div>

                <!-- Perfume cards -->
                <div class="row row-cols-4 g-4">
                    <!-- Perfume card 1 -->
                    <div class="col">
                        <figure class="text-center mb-0">
                            <a href="product.php?id=1">
                                <img src="https://loremflickr.com/350/350/perfume" class="img-fluid rounded shadow-sm" alt="Perfume">
                            </a>
                            <figcaption class="mt-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- Perfume card 2 -->
                    <div class="col">
                        <figure class="text-center mb-0">
                            <a href="product.php?id=2">
                                <img src="https://loremflickr.com/350/350/perfume" class="img-fluid rounded shadow-sm" alt="Perfume">
                            </a>
                            <figcaption class="mt-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- Perfume card 3 -->
                    <div class="col">
                        <figure class="text-center mb-0">
                            <a href="product.php?id=3">
                                <img src="https://loremflickr.com/350/350/perfume" class="img-fluid rounded shadow-sm" alt="Perfume">
                            </a>
                            <figcaption class="mt-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- Perfume card 4 -->
                    <div class="col">
                        <figure class="text-center mb-0">
                            <a href="product.php?id=4">
                                <img src="https://loremflickr.com/350/350/perfume" class="img-fluid rounded shadow-sm" alt="Perfume">
                            </a>
                            <figcaption class="mt-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <!-- See all ratings link -->
                <div class="text-end mt-3">
                    <a href="#" class="text-dark text-decoration-none">
                        See all ratings <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!--Recent reviews section-->
        <section class="bg-offwhite py-5">
            <div class="container">
                <!-- Title with underline -->
                <h2 class="fs-4 ms-4 mb-2">Recent Reviews</h2>
                <div class="border-top border-1 border-dark w-50 mb-4"></div>

                <!-- Review 1 -->
                <div class="row mb-5 align-items-start">
                    <!--Image-->
                    <div class="col-3">
                        <img src="https://loremflickr.com/350/350/perfume" alt="Perfume" class="img-fluid rounded">
                    </div>
                    <!--Rating-->
                    <div class="col-8 ps-4">
                        <div class="mb-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <!--Review title and text-->
                        <h3 class="h5 fw-bold mb-3">The perfect everyday scent!</h3>
                        <p class="text-secondary review-text">
                            I didn't expect to like this as much as I do, but it's quickly become one of my most reached for scents. The opening is bright without being sharp, and it settles into a warm, smooth base that lasts all day on my skin. What I enjoy most is how easy it is to wear—interesting enough to feel special, but not so heavy that it takes over a room ...
                        </p>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="row align-items-start">
                    <!--Image-->
                    <div class="col-3">
                        <img src="https://loremflickr.com/350/350/perfume" alt="Perfume" class="img-fluid rounded">
                    </div>
                    <!--Rating-->
                    <div class="col-8 ps-4">
                        <div class="mb-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <!--Review title and text-->
                        <h3 class="h5 fw-bold mb-3">The perfect everyday scent!</h3>
                        <p class="text-secondary review-text">
                            I didn't expect to like this as much as I do, but it's quickly become one of my most reached for scents. The opening is bright without being sharp, and it settles into a warm, smooth base that lasts all day on my skin. What I enjoy most is how easy it is to wear—interesting enough to feel special, but not so heavy that it takes over a room ...
                        </p>
                    </div>
                </div>

                <!-- See all reviews link -->
                <div class="text-end mt-5">
                    <a href="#" class="text-dark text-decoration-none">
                        See all reviews <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!--Top perfume notes section-->
        <section class="bg-red">
            <div class="row g-0 m-0 top-notes-row">
                <div class="col-6 text-white d-flex flex-column align-items-start pt-5 ps-5">
                    <div class="ps-5 mt-5 ms-5">
                        <h2 class="fs-1 mb-5">Top notes for Jane</h2>
                        <h3 class="fs-5 mb-4">Sea Water</h3>
                        <h3 class="fs-5 mb-4">Bergamotte</h3>
                        <h3 class="fs-5 mb-4">Lemon Verbena</h3>
                    </div>
                </div>
                <div class="col-6 h-100 p-0">
                    <img src="assets/images/notes-sea.webp" alt="Ocean waves" class="w-100 h-100 img-cover">
                </div>
            </div>
        </section>
    </main>
</body>