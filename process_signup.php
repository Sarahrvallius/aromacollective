<?php
// 1. Inkluderar databasuppkoppling
require_once 'assets/config/db.php';

// Kontrollera om formuläret har skickats
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Hämta data från formuläret
    $email = $_POST['email'];
    $gender = $_POST['gender'] ?? null;
    $password = $_POST['password'];

    // KRYPTERA LÖSENORDET
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Förbered SQL-frågan
    $sql = "INSERT INTO users (email, password, gender) VALUES (:email, :password, :gender)";

    try {
        $stmt = $dbh->prepare($sql);

        // Koppla variablerna till SQL-frågan
        $stmt->execute([
            ':email'    => $email,
            ':password' => $hashed_password,
            ':gender'   => $gender
        ]);

        // Om allt gick bra, Skicka användaren vidare
        header("Location: signin.php?signup=success");
        exit();
    } catch (PDOException $e) {
        // Om e-postadressen redan finns eller tabellen saknas
        die("Error: Could not register user. " . $e->getMessage());
    }
}
