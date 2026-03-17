<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// includes database connection
require_once 'assets/config/db.php';
// includes header
require_once 'assets/includes/header.php';

// selected perfume from the library page
$selectedPerfume = $_GET['perfume'] ?? 'woodsage';

$error = '';

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

// save new review
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = trim($_POST['user_name'] ?? '');
    $rating = (int)($_POST['rating'] ?? 0);
    $reviewText = trim($_POST['review_text'] ?? '');

    if ($userName === '' || $rating < 1 || $rating > 5 || $reviewText === '') {
        $error = 'Please fill in all fields.';
    } else {
        $stmt = $dbh->prepare("
            INSERT INTO reviews (perfume_id, user_name, rating, review_text)
            VALUES (:perfume_id, :user_name, :rating, :review_text)
        ");
        $stmt->execute([
            ':perfume_id' => $perfume['id'],
            ':user_name' => $userName,
            ':rating' => $rating,
            ':review_text' => $reviewText
        ]);

        header('Location: perfumes.php?perfume=' . urlencode($perfume['slug']));
        exit;
    }
}

// get reviews for selected perfume
$stmt = $dbh->prepare("
    SELECT *
    FROM reviews
    WHERE perfume_id = :perfume_id
    ORDER BY created_at DESC
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
function renderStars($rating) {
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
?>

<nav class="navbar navbar-expand-lg bg-offwhite">
    <div class="container py-2">
        <a class="navbar-brand fw-semibold library-brand" href="index.php">Aroma Collective</a>

        <div class="ms-auto d-flex gap-3">
            <a class="text-decoration-none text-dark" href="#">About us</a>
            <a class="text-decoration-none text-dark fw-semibold" href="library.php">Perfumes</a>
            <a class="text-decoration-none text-dark" href="profile.php">Profile</a>
        </div>
    </div>
</nav>

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
                    class="perfumes-hero-image img-fluid"
                >
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
                    <?php foreach ($reviews as $review): ?>
                        <div class="col-12 col-lg-8">
                            <div class="perfumes-review-card p-4">
                                <div class="d-flex gap-3 align-items-start">
                                    <div class="perfumes-profile-circle"></div>
                                    <div>
                                        <div class="fw-semibold mb-1">
                                            <?php echo htmlspecialchars($review['user_name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </div>
                                        <div class="mb-2"><?php echo renderStars($review['rating']); ?></div>
                                        <p class="mb-0">
                                            <?php echo htmlspecialchars($review['review_text'], ENT_QUOTES, 'UTF-8'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="row justify-content-center" id="write-review">
                <div class="col-12 col-lg-8">
                    <div class="perfumes-review-form-box p-4 p-md-5">
                        <h2 class="h4 mb-4 text-center">Share your thoughts about this fragrance</h2>

                        <?php if ($error !== ''): ?>
                            <div class="alert alert-danger mb-3">
                                <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="perfumes.php?perfume=<?php echo htmlspecialchars($perfume['slug'], ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="mb-3">
                                <label class="form-label">Your name</label>
                                <input type="text" name="user_name" class="form-control" placeholder="Enter your name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Your rating</label>
                                <select name="rating" class="form-select">
                                    <option value="">Choose rating</option>
                                    <option value="5">5 stars</option>
                                    <option value="4">4 stars</option>
                                    <option value="3">3 stars</option>
                                    <option value="2">2 stars</option>
                                    <option value="1">1 star</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Your review</label>
                                <textarea name="review_text" class="form-control" rows="5" placeholder="Write your thoughts about this fragrance..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-dark px-4 py-2">Post review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>

<?php
// includes footer
require_once 'assets/includes/footer.php';
?>