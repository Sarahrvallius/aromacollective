<?php
// 1. Inkluderar databasuppkoppling (här skapas $dbh)
require_once 'db.php';

// 2. Kontrollera om formuläret har skickats
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Hämta data från formuläret
    // (Se till att 'name' i din HTML matchar dessa exakt)
    $email = $_POST['email'];
    $gender = $_POST['gender'] ?? null;
    $password = $_POST['password'];

    // 4. KRYPTERA LÖSENORDET
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 5. Förbered SQL-frågan
    $sql = "INSERT INTO users (email, password, gender) VALUES (:email, :password, :gender)";

    try {
        $stmt = $dbh->prepare($sql);

        // 6. Koppla variablerna till SQL-frågan
        $stmt->execute([
            ':email'    => $email,
            ':password' => $hashed_password,
            ':gender'   => $gender
        ]);

        // 7. Om allt gick bra: Skicka användaren vidare
        header("Location: signin.php?signup=success");
        exit();
    } catch (PDOException $e) {
        // Om e-postadressen redan finns eller tabellen saknas
        die("Error: Could not register user. " . $e->getMessage());
    }
}
