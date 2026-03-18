<?php
//includes database connection
require_once __DIR__ . '/../config/db.php';

// INSERT to create account (add.php)
if (isset($_POST['register'])) {

    //create a query - skapa en förfrågan till databasen 
    $sql = '
        INSERT INTO users (firstname, lastname, email, gender, password, regdate)
        VALUES (:firstname, :lastname, :email, :gender, :password, NOW())
    ';

    //prepare query - förbered förfrågan 
    $stmt = $dbh->prepare($sql);

    //connects from fields with db containers
    $stmt->bindValue(':firstname', $_POST['firstname']);
    $stmt->bindValue(':lastname', $_POST['lastname']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':gender', $_POST['gender']);
    $stmt->bindValue(':password', $_POST['password']);

    // Sends query to database - skicka värderna till databasen 
    try {
        $stmt->execute();
        header('Location: ../../add.php?action=success');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// INSERT to change profile info (profile.php)
if (isset($_POST['save_profile'])) {
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../signin.php');
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $display_name = $_POST['display_name'];
    $age = $_POST['age'] !== '' ? $_POST['age'] : 0;
    $pronouns = $_POST['pronouns'];
    $bio = $_POST['bio'];
    $profile_image = 'profiles/placeholder-img.svg';

    // Check if profile row already exists
    $check_sql = 'SELECT user_id, profile_image FROM profiles WHERE user_id = :user_id LIMIT 1';
    $check_stmt = $dbh->prepare($check_sql);
    $check_stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $check_stmt->execute();
    $profile_exists = $check_stmt->fetch();

    // Keep old image only if it exists on disk
    if (
        $profile_exists &&
        !empty($profile_exists['profile_image']) &&
        $profile_exists['profile_image'] !== 'none' &&
        file_exists(__DIR__ . '/../images/' . $profile_exists['profile_image'])
    ) {
        $profile_image = $profile_exists['profile_image'];
    }

    $old_profile_image = $profile_image;

    // Profile image upload from profile.php form
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
        $file_name = basename($_FILES['profile_image']['name']);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = 'profile_' . $user_id . '_' . time();

        if ($ext !== '') {
            $new_file_name .= '.' . $ext;
        }

        $target_path = __DIR__ . '/../images/profiles/' . $new_file_name;

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_path)) {
            $profile_image = 'profiles/' . $new_file_name;

            if ($old_profile_image !== 'profiles/placeholder-img.svg') {
                $old_image_path = __DIR__ . '/../images/' . $old_profile_image;

                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
        }
    }

    if ($profile_exists) {
        // Update existing profile
        $sql = '
        UPDATE profiles
        SET display_name = :display_name,
            age = :age,
            pronouns = :pronouns,
            bio = :bio,
            profile_image = :profile_image
        WHERE user_id = :user_id
        ';
    } else {
        // Insert new profile the first time
        $sql = '
        INSERT INTO profiles (user_id, display_name, age, pronouns, bio, profile_image)
        VALUES (:user_id, :display_name, :age, :pronouns, :bio, :profile_image)
        ';
    }

    // Prepare query
    $stmt = $dbh->prepare($sql);

    // Connect form fields with db placeholders
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':display_name', $display_name);
    $stmt->bindValue(':age', $age, PDO::PARAM_INT);
    $stmt->bindValue(':pronouns', $pronouns);
    $stmt->bindValue(':bio', $bio);
    $stmt->bindValue(':profile_image', $profile_image);

    // Sends query to database
    try {
        $stmt->execute();
        header('Location: ../../profile.php?action=success');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
