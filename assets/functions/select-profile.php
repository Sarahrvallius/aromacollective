<?php
// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];

// Fetch the user's profile information from profiles table
$sql = 'SELECT display_name, age, pronouns, bio, profile_image FROM profiles WHERE user_id = :user_id LIMIT 1';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$profile = $stmt->fetch();

// Fetch user's name from users table
$sql = 'SELECT firstname, lastname FROM users WHERE id = :user_id LIMIT 1';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch();
$firstname = $user['firstname'] ?? '';
$lastname = $user['lastname'] ?? '';

// Fetch top 6 favorites (highest rated perfumes by logged-in user)
$sql = 'SELECT p.slug, p.name, p.image, r.rating
        FROM reviews r
        JOIN perfumes p ON p.id = r.perfume_id
        WHERE r.user_id = :user_id
        ORDER BY r.rating DESC, r.created_at DESC
        LIMIT 6';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$favorites = $stmt->fetchAll();

// Fetch 2 latest reviews by logged-in user
$sql = 'SELECT p.slug, p.name, p.image, r.id AS review_id, r.rating, r.review_text
    FROM reviews r
    JOIN perfumes p ON p.id = r.perfume_id
    WHERE r.user_id = :user_id
    ORDER BY r.id DESC
    LIMIT 2';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$recent_reviews = $stmt->fetchAll();

// Count total ratings and reviews from user to display in profile section
$sql = 'SELECT COUNT(*) as count FROM reviews WHERE user_id = :user_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch();
$rating_count = $result['count'];
$review_count = $result['count'];

// Save profile values in variables
$display_name = $profile['display_name'] ?? '';
$age = !empty($profile['age']) ? $profile['age'] : '';
$pronouns = $profile['pronouns'] ?? 'None';
$bio = $profile['bio'] ?? '';
$profile_image = $profile['profile_image'] ?? '';
// If profile image is empty or deleted, use placeholder
if ($profile_image === '' || $profile_image === 'none' || !file_exists(__DIR__ . '/../../assets/images/' . $profile_image)) {
    $profile_image = 'profiles/placeholder-img.svg';
}

// Prepare display info
$full_name = $display_name !== '' ? $display_name : $firstname . ' ' . $lastname;
$bio_text = $bio !== '' ? $bio : 'Tell us about yourself!';
$age_pronouns_text = '';
if ($age !== '' || $pronouns !== 'None') {
    $age_pronouns_text = ($age !== '' ? $age . ' years' : '') . ($pronouns !== 'None' ? ($age !== '' ? '. ' : '') . $pronouns : '') . '.';
}

