<?php
// Gets all information from database 

$sql = "SELECT * FROM users";
//prepare a query
$stmt = $dbh->prepare($sql);
//Sends queery to database
$stmt->execute();
