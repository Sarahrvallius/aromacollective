<?php
if (isset($_POST['modify'])) {
    //creates a query
    $sql = '
    UPDATE users
    SET firstname=:firstname, 
        lastname=:lastname,
        email=:email,
        gender=:gender
    WHERE id=:id
    ';
    //prepares the query
    $stmt = $dbh->prepare($sql);
    //connects form fields with db containers 
    $stmt->bindValue(':firstname', $_POST['firstname']);
    $stmt->bindValue(':lastname', $_POST['lastname']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':gender', $_POST['gender']);
    $stmt->bindValue(':id', $_POST['id']);

    // Sends query to database
    try {
        $stmt->execute();
        header('Location: ../../view.php?action=updated');
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
