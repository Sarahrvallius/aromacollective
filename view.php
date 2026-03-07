<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//Get information from database
require_once 'assets/functions/select.php';
// inkluderar header
require_once 'assets/includes/header.php';
?>

<main class="container mt-5">
    <?php
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'updated':
                echo '<div class="alert alert-success text-center" role="alert">
                        Account updated successfully!
                      </div>';
                break;
        }
    }
    ?>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th colspan=2>Administration</th>
        </tr>

        <?php
        //Checks wether database contains information
        if ($stmt->rowCount() > 0) {
            //Get users fron database
            while ($row = $stmt->fetch()) {
                //prints out users in table
                echo ' 
                <tr> 
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['email'] . '</td>

                    <td>
                    <i class="fa-solid fa-pen-to-square"></i> 
                    <a href="edit.php?id=' . $row['id'] . '">Uppdatera</a>
                    </td> 
                    
                    <td>
                    <i class="fa-solid fa-trash-can"></i> 
                    <a href="remove.php?id=' . $row['id'] . '">Radera</a>
                    </td>  
                    
               </tr>
            ';
            }
        } else {
            //Print out if databse is empty
            echo ' <tr>
                  <td colspan="5"> No users found.</td>
                  </tr> ';
        }
        ?>
    </table>
</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>