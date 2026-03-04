<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// inkluderar header
require_once 'assets/includes/header.php';
//includes database connection
require_once 'assets/config/db.php';
?>

    <main>
        <!--Profile-->
        <section class="bg-offwhite py-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Profile Image -->
                    <div class="col-md-3 offset-md-1 text-center mb-4 mb-md-0 me-5">
                        <img src="assets/images/profiletemporary.png" alt="Profile" class="rounded-circle img-fluid mb-3 profile-img">
                        <a href="#" class="text-dark text-decoration-none">
                            <i class="fa-regular fa-pen-to-square me-2"></i>Edit profile
                        </a>
                    </div>

                    <!-- Profile Info -->
                    <div class="col-md-7 ps-5">
                        <div class="d-flex gap-5 align-items-start mb-2">
                            <h1 class="display-5 mb-0">Jane Doe</h1>
                            <div class="text-end mt-1">
                                <p class="mb-0"><strong>23</strong> Ratings</p>
                                <p class="mb-0"><strong>6</strong> Reviews</p>
                            </div>
                        </div>
                        <p class="mb-3">29 years. She/her.</p>
                        <p class="profile-bio">
                            Hey, I'm Jane! I enjoy trying new scents and seeing how they actually wear day to day. I share quick, honest impressions and love hearing what others are into.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!--Favorites-->
        <section class="bg-beige py-5">
            <div class="container">
                <!-- Title with underline -->
                <h2 class="fs-4 ms-4 mb-2">Favorites</h2>
                <div class="border-top border-1 border-dark w-50 mb-4"></div>

                <!-- Perfume cards -->
                <div class="row row-cols-4 g-4">
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
    </main>
