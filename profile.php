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
        <!--Profile-->
        <section class="bg-offwhite py-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Profile Image -->
                    <div class="col-md-3 offset-md-1 text-center mb-4 mb-md-0 me-5">
                        <img src="assets/images/profiletemporary.png" alt="Profile" class="rounded-circle img-fluid mb-3" style="width: 250px; height: 250px; object-fit: cover;">
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
                        <p class="mb-3" style="font-size: 1.1rem;">29 years. She/her.</p>
                        <p style="max-width: 450px;">
                            Hey, I'm Jane! I enjoy trying new scents and seeing how they actually wear day to day. I share quick, honest impressions and love hearing what others are into.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
