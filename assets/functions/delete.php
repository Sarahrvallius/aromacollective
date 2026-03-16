<?php
if (isset($_POST['delete'])) {
    //creates a query
    $sql = '
    DELETE FROM users   
    WHERE id=:id
    ';

    //prepares the query
    $stmt = $dbh->prepare($sql);
    //connects form fields with db containers 
    $stmt->bindValue(':id', $_POST['id']);

    // Sends query to database
    try {
        $stmt->execute();
        header('Location: ../../index.php?action=deleted');
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
