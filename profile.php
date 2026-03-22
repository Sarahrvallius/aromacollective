<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
// includes header
require_once 'assets/includes/header.php';
// SELECT (fetch) all profile data
require_once 'assets/functions/select-profile.php';

// Check if user is logged in, if not redirect to signin page
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit;
}
?>

<main>
    <!--Profile section-->
    <section class="bg-offwhite py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Profile Image-->
                <div class="col-3 offset-1 text-center me-5">
                    <img src="assets/images/<?php echo $profile_image; ?>" alt="Profile" class="rounded-circle img-fluid mb-3 profile-img">
                    <!--Edit profile modal trigger-->
                    <button type="button" class="btn border-0 bg-transparent text-dark p-0" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fa-regular fa-pen-to-square me-2"></i>Edit profile
                    </button>
                </div>

                <!-- Profile name, info, bio -->
                <div class="col-7 ps-5">
                    <div class="d-flex gap-5 align-items-start mb-2">
                        <!-- Shows display name as firstname + lastname from users table if display name is empty -->
                        <h1 class="display-5 mb-0"><?php echo $full_name; ?></h1>
                        <!-- Shows number of ratings and reviews -->
                        <div class="text-end mt-1">
                            <p class="mb-0"><strong><?php echo $rating_count; ?></strong> Ratings</p>
                            <p class="mb-0"><strong><?php echo $review_count; ?></strong> Reviews</p>
                        </div>
                    </div>
                    <!-- Shows age and pronouns if either is not empty/none -->
                    <?php if ($age_pronouns_text !== '') { ?>
                        <p class="mb-3"><?php echo $age_pronouns_text; ?></p>
                    <?php } ?>
                    <!-- Shows bio, or placeholder text if bio is empty -->
                    <p class="text-secondary w-75">
                        <?php echo $bio_text; ?>
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
            <div class="row row-cols-6 g-3">
                <?php
                // Checks whether user has any favorites
                if (count($favorites) > 0) {
                    // Loops through favorites and displays perfume cards
                    foreach ($favorites as $favorite) {
                        // Generate correct number of filled and empty stars based on rating
                        $stars = '';
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= (int) $favorite['rating']) {
                                $stars .= '<i class="fa-solid fa-star"></i>';
                            } else {
                                $stars .= '<i class="fa-regular fa-star"></i>';
                            }
                        }
                        // Display perfume card with image, name, and star rating
                        echo '<div class="col">
                            <figure class="text-center mb-0">
                                <a href="perfumes.php?perfume=' . $favorite['slug'] . '">
                                    <img src="' . $favorite['image'] . '" class="perfume-image perfume-card perfume-card:hover img-fluid w-100 d-block" alt="' . $favorite['name'] . '">
                                </a>
                                <figcaption class="mt-2">' . $stars . '</figcaption>
                            </figure>
                        </div>';
                    }
                } else {
                    // If user has no ratings, display message
                    echo '<div class="col-12"><p class="text-center mb-0">No favorites yet.</p></div>';
                }
                ?>
            </div>
            <!-- See all ratings link (not functional) -->
            <div class="text-end mt-5">
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
            <?php
            // If user has reviews, display the two most recent
            if (count($recent_reviews) > 0) {
                foreach ($recent_reviews as $review) {
                    $stars = '';
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= (int) $review['rating']) {
                            $stars .= '<i class="fa-solid fa-star mt-3 mb-2"></i>';
                        } else {
                            $stars .= '<i class="fa-regular fa-star mt-3 mb-2"></i>';
                        }
                    }
                    // Shorten review text to 600 characters and add "..." + link if longer
                    $review_text = $review['review_text'];
                    $max_length = 600;
                    $is_long = strlen($review_text) > $max_length;
                    if ($is_long) {
                        $review_text = substr($review_text, 0, $max_length) . '...';
                    }
                    // Display review with perfume image, name, star rating, and review text
                    echo '<div class="row mb-5 align-items-start">
                            <div class="col-3">
                                <a href="perfumes.php?perfume=' . $review['slug'] . '">
                                    <img src="' . $review['image'] . '" alt="' . $review['name'] . '" class="perfume-image perfume-card img-fluid w-100 d-block">
                                </a>
                          </div>
                          <div class="col-8 ps-4">
                              <h3 class="h5 fw-bold mt-3">' . $review['name'] . '</h3>
                              <div class="mb-2 mt-3">' . $stars . '</div>
                              
                              <p class="fw-bold">' . $review['review_title'] . '</p>
                              <p class="text-secondary w-75">' . $review_text;
                    // If review text was shortened, add link to full review
                    if ($is_long) {
                        echo ' <a href="perfumes.php?perfume=' . $review['slug'] . '#review-' . $review['review_id'] . '" class="text-decoration-none text-dark">Read full review</a>';
                    }
                    echo '</p>';
                    echo '       </div>
                                        </div>';
                }
                // If user doesn't have any reviews, display message
            } else {
                echo '<p class="text-center mb-0">No reviews yet.</p>';
            }
            ?>

            <!-- See all reviews link (non-functional) -->
            <div class="text-end mt-5">
                <a href="#" class="text-dark text-decoration-none">
                    See all reviews <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!--Top perfume notes section (non-functional) -->
    <section class="bg-red">
        <div class="row g-0 m-0 top-notes-row">
            <div class="col-6 text-white d-flex flex-column align-items-start pt-5 ps-5">
                <div class="ps-5 mt-5 ms-5">
                    <h2 class="fs-1 mb-5">Top notes for <?php echo $firstname; ?></h2>
                    <h3 class="fs-5 mb-4">Sea Water</h3>
                    <h3 class="fs-5 mb-4">Bergamotte</h3>
                    <h3 class="fs-5 mb-4">Lemon Verbena</h3>
                </div>
            </div>
            <div class="col-6 h-100 p-0">
                <img src="assets/images/notes-sea.webp" alt="Ocean waves" class="w-100 h-100 object-fit-cover">
            </div>
        </div>
    </section>

    <!-- Edit profile modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-offwhite">
                <!--Header with title and close button-->
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="editProfileModalLabel">Edit profile</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Form with profile image upload, name, age, pronouns, and bio-->
                <form action="assets/functions/insert-profile.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="display_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" maxlength="100" value="<?php echo $display_name !== '' ? $display_name : $firstname . ' ' . $lastname; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" min="1" max="120" value="<?php echo $age; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pronouns" class="form-label">Pronouns</label>
                            <select class="form-select" id="pronouns" name="pronouns">
                                <option value="She/her" <?php echo $pronouns === 'She/her' ? 'selected' : ''; ?>>She/her</option>
                                <option value="He/him" <?php echo $pronouns === 'He/him' ? 'selected' : ''; ?>>He/him</option>
                                <option value="They/them" <?php echo $pronouns === 'They/them' ? 'selected' : ''; ?>>They/them</option>
                                <option value="None" <?php echo $pronouns === 'None' ? 'selected' : ''; ?>>None</option>
                            </select>
                        </div>
                        <div>
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="4"><?php echo $bio !== '' ? $bio : 'Tell us about yourself!'; ?></textarea>
                        </div>
                    </div>
                    <!--Footer with cancel and save buttons-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-dark" name="save_profile">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
// includes footer
require_once 'assets/includes/footer.php';
?>