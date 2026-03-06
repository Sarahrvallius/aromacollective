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

    // TEMPORARY: Hårdkodat user_id tills inloggning finns
    // Byt ut detta:
    $user_id = 1;
    /* Till detta:
    session_start();
    $user_id = $_SESSION['user_id']; */


    // Check if profile already exists for this user
    $check_sql = 'SELECT user_id FROM profiles WHERE user_id = :user_id LIMIT 1';
    $check_stmt = $dbh->prepare($check_sql);
    $check_stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $check_stmt->execute();
    $profile_exists = $check_stmt->fetch();

    if ($profile_exists) {
        // Update existing profile
        $sql = '
        UPDATE profiles
        SET display_name = :display_name,
            age = :age,
            pronouns = :pronouns,
            bio = :bio
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
    $stmt->bindValue(':display_name', $_POST['display_name']);
    $stmt->bindValue(':age', $_POST['age']);
    $stmt->bindValue(':pronouns', $_POST['pronouns']);
    $stmt->bindValue(':bio', $_POST['bio']);

    if (!$profile_exists) {
        $stmt->bindValue(':profile_image', 'profiletemporary.png');
    }

    // Sends query to database
    try {
        $stmt->execute();
        header('Location: ../../profile.php?action=success');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
