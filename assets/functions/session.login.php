<?php
//checks wether loginbutton is clicked
if (isset($_POST['login'])) {

    //check wether e-mail and password fields are empty
    if (empty($_POST['email']) || empty($_POST['password'])) {

        //Redirect to index.php with error message
        header('Location: ../../index.php?action=empty');
        exit();
    }

    //trims e-mail and password - take away whitespace from the beginning and end of the string
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    //Creates, prepare, bind and execute a query to check if the user exists in the database
    $sql = 'SELECT * 
            FROM users 
            WHERE email = :email
            AND password = :password
            ';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();

    //counts the number of rows that match the query
    $count = $stmt->rowCount();
    //checks wether user exist 
    if ($count > 0) {

        //Save result to variable
        $row = $stmt->fetch();
        //creates session variable with user id
        $_SESSION['user_id'] = $row['id'];
        //Redirect to index.php with success message
        header('Location: ../../index.php?action=success');
        exit();

        //redirect to index.php with error message if user does not exist
    } else {
        header('Location: ../../index.php?action=error');
=======
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: profile.php');
        exit();
    }

    header('Location: signin.php?action=invalid');
    exit();
}
