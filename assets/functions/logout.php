<?php //Logout user from system
 session_start();
 session_destroy();
 header('Location: ../../index.php?action=logout');

?>