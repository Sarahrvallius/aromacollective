<?php
//includes database connection
require_once __DIR__ . '/../config/db.php';

// START SESSION for account creation
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

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


        // Get the ID of the newly created user from database
        $select_sql = 'SELECT id FROM users WHERE email = :email LIMIT 1';
        $select_stmt = $dbh->prepare($select_sql);
        $select_stmt->bindValue(':email', $_POST['email']);
        $select_stmt->execute();
        $user = $select_stmt->fetch();
        $user_id = $user['id'];

        // Set session variables to log in the user
        $_SESSION['user_id'] = $user_id;
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];

        // Redirect to profile.php with account_created action
        header('Location: ../../profile.php?action=account_created');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
