<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// includes database connection
require_once 'assets/config/db.php';
// includes functions for inserting data into database
require_once 'assets/functions/perfume.function.php';
// includes header
require_once 'assets/includes/header.php';
?>

<!-- PERFUME DETAIL PAGE -->
<main class="bg-offwhite">
    <section class="py-5">
        <div class="container">
            <div class="mb-4">
                <a href="library.php" class="text-decoration-none text-dark">← Back to library</a>
            </div>

            <div class="text-center mb-4">
                <div class="text-uppercase mb-2"><?php echo htmlspecialchars($perfume['brand'], ENT_QUOTES, 'UTF-8'); ?></div>
                <h1 class="fs-1 mb-2"><?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <p class="w-50 mx-auto mb-3">
                    <?php echo htmlspecialchars($perfume['subtitle'], ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                    <span class="rounded-pill px-3 py-1 text-white small bg-beige px-3 py-1">
                        <?php echo htmlspecialchars($perfume['category'], ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                    <span><?php echo $reviewCount; ?> reviews</span>
                </div>
            </div>

            <div class="text-center mb-4">
                <img
                    src="<?php echo htmlspecialchars($perfume['image'], ENT_QUOTES, 'UTF-8'); ?>"
                    alt="<?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?>"
                    class="perfumes-hero-image rounded-4 img-fluid">
            </div>

            <div class="text-center mb-5">
                <div class="mb-2"><?php echo renderStars(round($averageRating)); ?></div>
                <div><?php echo $averageRating; ?> / 5 stars</div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-8">
                    <div class="border rounded-4 bg-white p-4 p-md-5">
                        <p class="mb-4">
                            <?php echo htmlspecialchars($perfume['description'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <div>
                            <h2 class="h4 mb-3">Notes</h2>
                            <p class="mb-2"><strong>Top notes:</strong> <?php echo htmlspecialchars($perfume['top_notes'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="mb-2"><strong>Heart notes:</strong> <?php echo htmlspecialchars($perfume['heart_notes'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="mb-0"><strong>Base notes:</strong> <?php echo htmlspecialchars($perfume['base_notes'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mb-5">
                <a href="#write-review" class="btn btn-outline-dark px-4 py-2">Write a review</a>
            </div>

            <section class="mb-5">
                <h2 class="text-center mb-4">See what people have to say about this fragrance</h2>

                <div class="row justify-content-center g-2">
                    <?php if (count($reviews) > 0): ?>
                        <?php foreach ($reviews as $review): ?>
                            <?php
                            $reviewProfileImage = $review['reviewer_profile_image'];
                            if ($reviewProfileImage == '' || $reviewProfileImage == 'none') {
                                $reviewProfileImage = 'profiles/placeholder-img.svg';
                            }
                            ?>
                            <div class="col-12 col-lg-8" id="review-<?php echo (int) $review['id']; ?>">
                                <div class="border rounded-4 bg-white p-4">
                                    <div class="d-flex gap-3 align-items-start">
                                        <?php echo '<img src="assets/images/' . $reviewProfileImage . '" alt="Profile image" class="rounded-circle object-fit-cover flex-shrink-0 review-profile-image">'; ?>
                                        <div class="w-100">
                                            <div class="fw-semibold mb-1">
                                                <?php echo htmlspecialchars($review['user_name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                            <div class="mb-2"><?php echo renderStars($review['rating']); ?></div>
                                            <p class="mb-3">
                                                <?php echo htmlspecialchars($review['review_text'], ENT_QUOTES, 'UTF-8'); ?>
                                            </p>

                                            <div class="d-flex gap-2">
                                                <a
                                                    href="perfumes.php?perfume=<?php echo urlencode($perfume['slug']); ?>&edit_review=<?php echo (int) $review['id']; ?>#write-review"
                                                    class="btn btn-sm btn-outline-dark">
                                                    Edit
                                                </a>

                                                <a
                                                    href="perfumes.php?perfume=<?php echo urlencode($perfume['slug']); ?>&delete_review=<?php echo (int) $review['id']; ?>"
                                                    class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this review?');">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 col-lg-8">
                            <div class="p-4 text-center">
                                <p class="mb-0">No reviews yet. Be the first to write one.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <!-- review form -->
            <?php
            // check if user is logged in, if so show review form
            if (isset($_SESSION['user_id'])):
            ?>
                <section class="row justify-content-center" id="write-review">
                    <div class="col-12 col-lg-8">
                        <div class="border rounded-4 bg-white p-4 p-md-5">
                            <h2 class="h4 mb-4 text-center">
                                <?php echo $editReview ? 'Edit your review' : 'Share your thoughts about this fragrance'; ?>
                            </h2>

                            <?php if ($error !== ''): ?>
                                <div class="alert alert-danger mb-3">
                                    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                                </div>
                            <?php endif; ?>



                            <form method="POST" action="perfumes.php?perfume=<?php echo htmlspecialchars($perfume['slug'], ENT_QUOTES, 'UTF-8'); ?>#write-review">
                                <input type="hidden" name="edit_id" value="<?php echo $editReview ? (int) $editReview['id'] : 0; ?>">

                                <!-- Namebox-->
                                <div class="mb-3">
                                    <label class="form-label">Your name</label>
                                    <input
                                        type="text"
                                        name="user_name"
                                        class="form-control"
                                        placeholder="Enter your name"
                                        value="<?php
                                                // checks if firstname and lastname session variables are set, if so it will show them in the input field, otherwise it will be empty
                                                if (isset($_SESSION['firstname'], $_SESSION['lastname'])) {
                                                    echo htmlspecialchars($_SESSION['firstname'] . ' ' . $_SESSION['lastname']);
                                                }
                                                ?>">
                                </div>

                                <!-- Rating, in stars-->
                                <div class=" mb-3">
                                    <label class="form-label">Your rating</label>
                                    <select name="rating" class="form-select">
                                        <option value="">Choose rating</option>
                                        <option value="5" <?php echo (($editReview['rating'] ?? '') == 5) ? 'selected' : ''; ?>>5 stars</option>
                                        <option value="4" <?php echo (($editReview['rating'] ?? '') == 4) ? 'selected' : ''; ?>>4 stars</option>
                                        <option value="3" <?php echo (($editReview['rating'] ?? '') == 3) ? 'selected' : ''; ?>>3 stars</option>
                                        <option value="2" <?php echo (($editReview['rating'] ?? '') == 2) ? 'selected' : ''; ?>>2 stars</option>
                                        <option value="1" <?php echo (($editReview['rating'] ?? '') == 1) ? 'selected' : ''; ?>>1 star</option>
                                    </select>
                                </div>

                                <!-- Your review - in text -->
                                <div class="mb-4">
                                    <label class="form-label">Your review</label>
                                    <textarea
                                        name="review_text"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Write your thoughts about this fragrance..."><?php echo htmlspecialchars($editReview['review_text'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                                </div>

                                <div class="text-center d-flex justify-content-center gap-2 flex-wrap">

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-dark px-4 py-2">
                                        <?php echo $editReview ? 'Update review' : 'Post review'; ?>
                                    </button>

                                    <?php if ($editReview): ?>
                                        <a
                                            href="perfumes.php?perfume=<?php echo urlencode($perfume['slug']); ?>#write-review"
                                            class="btn btn-outline-secondary px-4 py-2">
                                            Cancel
                                        </a>
                                    <?php endif; ?>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>

                <!-- If not logged in this information will be shown -->
            <?php else: // if not logged in, this will show 
            ?>

                <section class="row justify-content-center">
                    <div class="col-12 col-lg-8 text-center p-5 border bg-light">
                        <h2 class="h5 mb-3">Want to share your thoughts?</h2>
                        <p class="mb-4 text-muted">You need to be logged in to write a review.</p>
                        <a href="signin.php" class="btn btn-outline-dark px-4">Sign In to Review</a>
                    </div>
                </section>

            <?php endif; //end the check
            ?>

        </div>
    </section>
</main>


<?php
// includes footer
require_once 'assets/includes/footer.php';
?>