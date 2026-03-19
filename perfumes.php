<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// includes database connection
require_once 'assets/config/db.php';

// start session to get logged in user id
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$loggedInUserId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;

// selected perfume from the library page
$selectedPerfume = $_GET['perfume'] ?? 'woodsage';

$error = '';
$editReview = null;

// get selected perfume from database
$stmt = $dbh->prepare("
    SELECT *
    FROM perfumes
    WHERE slug = :slug
    LIMIT 1
");
$stmt->execute([
    ':slug' => $selectedPerfume
]);

$perfume = $stmt->fetch();

if (!$perfume) {
    $stmt = $dbh->prepare("
        SELECT *
        FROM perfumes
        WHERE slug = 'woodsage'
        LIMIT 1
    ");
    $stmt->execute();
    $perfume = $stmt->fetch();
}

// delete review
if (isset($_GET['delete_review'])) {
    $reviewId = (int) $_GET['delete_review'];

    $stmt = $dbh->prepare("
        DELETE FROM reviews
        WHERE id = :review_id
        AND perfume_id = :perfume_id
    ");
    $stmt->execute([
        ':review_id' => $reviewId,
        ':perfume_id' => $perfume['id']
    ]);

    header('Location: perfumes.php?perfume=' . urlencode($perfume['slug']));
    exit;
}

// get review for editing
if (isset($_GET['edit_review'])) {
    $editReviewId = (int) $_GET['edit_review'];

    $stmt = $dbh->prepare("
        SELECT *
        FROM reviews
        WHERE id = :review_id
        AND perfume_id = :perfume_id
        LIMIT 1
    ");
    $stmt->execute([
        ':review_id' => $editReviewId,
        ':perfume_id' => $perfume['id']
    ]);

    $editReview = $stmt->fetch();
}

// save new review or update existing review
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = trim($_POST['user_name'] ?? '');
    $rating = (int)($_POST['rating'] ?? 0);
    $reviewText = trim($_POST['review_text'] ?? '');
    $editId = isset($_POST['edit_id']) ? (int) $_POST['edit_id'] : 0;

    if ($userName === '' || $rating < 1 || $rating > 5 || $reviewText === '') {
        $error = 'Please fill in all fields.';
    } else {
        if ($editId > 0) {
            $stmt = $dbh->prepare("
                UPDATE reviews
                SET user_name = :user_name,
                    rating = :rating,
                    review_text = :review_text
                WHERE id = :review_id
                AND perfume_id = :perfume_id
            ");
            $stmt->execute([
                ':user_name' => $userName,
                ':rating' => $rating,
                ':review_text' => $reviewText,
                ':review_id' => $editId,
                ':perfume_id' => $perfume['id']
            ]);
        } else {
            $stmt = $dbh->prepare("
                INSERT INTO reviews (perfume_id, user_id, user_name, rating, review_text)
                VALUES (:perfume_id, :user_id, :user_name, :rating, :review_text)
            ");
            $stmt->execute([
                ':perfume_id' => $perfume['id'],
                ':user_id' => $loggedInUserId,
                ':user_name' => $userName,
                ':rating' => $rating,
                ':review_text' => $reviewText
            ]);
        }

        header('Location: perfumes.php?perfume=' . urlencode($perfume['slug']));
        exit;
    }
}

// get reviews for selected perfume
$stmt = $dbh->prepare("
    SELECT *
    FROM reviews
    WHERE perfume_id = :perfume_id
    ORDER BY created_at DESC, id DESC
");
$stmt->execute([
    ':perfume_id' => $perfume['id']
]);

$reviews = $stmt->fetchAll();

// calculate average rating from reviews
$reviewCount = count($reviews);
$totalRating = 0;

foreach ($reviews as $review) {
    $totalRating += $review['rating'];
}

$averageRating = $reviewCount > 0 ? round($totalRating / $reviewCount, 1) : 0;

// displays filled and empty stars based on rating
function renderStars($rating)
{
    $output = '';

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '<span class="perfumes-star perfumes-star-filled">★</span>';
        } else {
            $output .= '<span class="perfumes-star">★</span>';
        }
    }

    return $output;
}

// includes header
require_once 'assets/includes/header.php';
?>

<main class="bg-offwhite">
    <section class="py-5">
        <div class="container perfumes-page-container">
            <div class="mb-4">
                <a href="library.php" class="text-decoration-none text-dark">← Back to library</a>
            </div>

            <div class="text-center mb-4">
                <div class="perfumes-brand mb-2"><?php echo htmlspecialchars($perfume['brand'], ENT_QUOTES, 'UTF-8'); ?></div>
                <h1 class="perfumes-title mb-2"><?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <p class="perfumes-subtitle text-muted mb-3">
                    <?php echo htmlspecialchars($perfume['subtitle'], ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                    <span class="perfumes-category-badge px-3 py-1">
                        <?php echo htmlspecialchars($perfume['category'], ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                    <span><?php echo $reviewCount; ?> reviews</span>
                </div>
            </div>

            <div class="text-center mb-4">
                <img
                    src="<?php echo htmlspecialchars($perfume['image'], ENT_QUOTES, 'UTF-8'); ?>"
                    alt="<?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?>"
                    class="perfumes-hero-image img-fluid">
            </div>

            <div class="text-center mb-5">
                <div class="mb-2"><?php echo renderStars(round($averageRating)); ?></div>
                <div><?php echo $averageRating; ?> / 5 stars</div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-8">
                    <div class="perfumes-info-box p-4 p-md-5">
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

                <div class="row justify-content-center g-4">
                    <?php if (count($reviews) > 0): ?>
                        <?php foreach ($reviews as $review): ?>
                            <div class="col-12 col-lg-8">
                                <div class="perfumes-review-card p-4">
                                    <div class="d-flex gap-3 align-items-start">
                                        <div class="perfumes-profile-circle"></div>
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
                            <div class="perfumes-review-card p-4 text-center">
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
                        <div class="perfumes-review-form-box p-4 p-md-5">
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

                                <div class="mb-3">
                                    <label class="form-label">Your name</label>
                                    <input
                                        type="text"
                                        name="user_name"
                                        class="form-control"
                                        placeholder="Enter your name"
                                        value="<?php echo htmlspecialchars($editReview['user_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                </div>

                                <div class="mb-3">
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

                                <div class="mb-4">
                                    <label class="form-label">Your review</label>
                                    <textarea
                                        name="review_text"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Write your thoughts about this fragrance..."><?php echo htmlspecialchars($editReview['review_text'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                                </div>

                                <div class="text-center d-flex justify-content-center gap-2 flex-wrap">
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