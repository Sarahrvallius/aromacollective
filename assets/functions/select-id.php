<?php
if (isset($_GET['id'])) {
    // Get specific user information from database
    $sql = 'SELECT * FROM users WHERE id = :id';
    //prepare query 
    $stmt = $dbh->prepare($sql);
    // Connect varible to db containers
    $stmt->bindValue(':id', $_GET['id']);
    //send query to database
    $stmt->execute();
    //Adds all information about user to variable
    $row = $stmt->fetch();
}
