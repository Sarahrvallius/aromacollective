<?php
// INSERT and UPDATE functions for profile.php form
// Includes database connection
require_once __DIR__ . '/../config/db.php';

// Starts session
if (isset($_POST['save_profile'])) {
    session_start();
    // Checks if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../signin.php');
        exit();
    }

    // Get fields from form and set default values
    $user_id = $_SESSION['user_id'];
    $display_name = $_POST['display_name'];
    $age = $_POST['age'] !== '' ? $_POST['age'] : 0;
    $pronouns = $_POST['pronouns'];
    $bio = $_POST['bio'];
    $profile_image = 'profiles/placeholder-img.svg';

    // Check if profile info already exists (to decide between UPDATE/INSERT)
    $check_sql = 'SELECT user_id, profile_image FROM profiles WHERE user_id = :user_id LIMIT 1';
    $check_stmt = $dbh->prepare($check_sql);
    $check_stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $check_stmt->execute();
    $profile_exists = $check_stmt->fetch();

    // Get users current profile image
    $old_profile_image = 'profiles/placeholder-img.svg';
    if ($profile_exists && !empty($profile_exists['profile_image']) && $profile_exists['profile_image'] !== 'none') {
        $old_profile_image = $profile_exists['profile_image'];
    }
    $profile_image = $old_profile_image;

    // Handles new file upload for profile image 
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
        $file_name = basename($_FILES['profile_image']['name']);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = 'profile_' . $user_id . '_' . time() . ($ext ? '.' . $ext : '');
        $target_path = __DIR__ . '/../images/profiles/' . $new_file_name;

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_path)) {
            $profile_image = 'profiles/' . $new_file_name;

            // Deletes old profile image from images/profiles if a new one is uploaded
            if ($old_profile_image !== 'profiles/placeholder-img.svg') {
                $old_image_path = __DIR__ . '/../images/' . $old_profile_image;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
        }
    }

    // Decides between UPDATE or INSERT query 
    if ($profile_exists) {
        $sql = 'UPDATE profiles SET display_name = :display_name, age = :age, pronouns = :pronouns, bio = :bio, profile_image = :profile_image WHERE user_id = :user_id';
    } else {
        $sql = 'INSERT INTO profiles (user_id, display_name, age, pronouns, bio, profile_image) VALUES (:user_id, :display_name, :age, :pronouns, :bio, :profile_image)';
    }

    // Prepares query
    $stmt = $dbh->prepare($sql);
    //Connects form fields with db containers
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':display_name', $display_name);
    $stmt->bindValue(':age', $age, PDO::PARAM_INT);
    $stmt->bindValue(':pronouns', $pronouns);
    $stmt->bindValue(':bio', $bio);
    $stmt->bindValue(':profile_image', $profile_image);

    // Execute query and redirect to profile page, or show error if it fails
    try {
        $stmt->execute();
        header('Location: ../../profile.php?action=success');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
