<?php
//includes database connection
require_once 'assets/config/db.php';


if (){

    //isset= control that someone push the button 
    isset($_POST ['register']) 

    //create a query - skapa en förfrågan till databasen 
    $sql = '
        INSERT INTO users (fistname, lastname, email, gender, password, regdate)
        VALUES (:firstname, :lastname, :email, :gender, :pasword, NOW())

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
    try{ $stmt->execute();
         header('Location: ../../add.php?action=success');
         }
    catch (PDOException $e){
        echo $e->getMessage();
    }
    

}

