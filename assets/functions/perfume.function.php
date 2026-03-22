<?php
//includes database connection
require_once __DIR__ . '/../config/db.php';

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

// delete review from database
if (isset($_GET['delete_review'])) {
    $reviewId = (int) $_GET['delete_review'];

    $stmt = $dbh->prepare("
        DELETE FROM reviews
        WHERE id = :review_id
        AND perfume_id = :perfume_id
        AND user_id = :user_id
    ");
    $stmt->execute([
        ':review_id' => $reviewId,
        ':perfume_id' => $perfume['id'],
        ':user_id' => $loggedInUserId
    ]);

    header('Location: perfumes.php?perfume=' . urlencode($perfume['slug']));
    exit;
}

// get review for editing only if it belongs to the logged in user
if (isset($_GET['edit_review'])) {
    $editReviewId = (int) $_GET['edit_review'];

    $stmt = $dbh->prepare("
        SELECT *
        FROM reviews
        WHERE id = :review_id
        AND perfume_id = :perfume_id
        AND user_id = :user_id
        LIMIT 1
    ");
    $stmt->execute([
        ':review_id' => $editReviewId,
        ':perfume_id' => $perfume['id'],
        ':user_id' => $loggedInUserId
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
           // only update review if it belongs to the logged in user
$stmt = $dbh->prepare("
    UPDATE reviews
    SET user_name = :user_name,
        rating = :rating,
        review_text = :review_text
    WHERE id = :review_id
    AND perfume_id = :perfume_id
    AND user_id = :user_id
");
$stmt->execute([
    ':user_name' => $userName,
    ':rating' => $rating,
    ':review_text' => $reviewText,
    ':review_id' => $editId,
    ':perfume_id' => $perfume['id'],
    ':user_id' => $loggedInUserId
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
    SELECT reviews.*, profiles.profile_image AS reviewer_profile_image
    FROM reviews
    LEFT JOIN profiles ON profiles.user_id = reviews.user_id
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
            $output .= '<span class="fs-4 text-beige">★</span>';
        } else {
            $output .= '<span class="fs-4 text-secondary">★</span>';
        }
    }

    return $output;
}
// includes header
require_once 'assets/includes/header.php';
