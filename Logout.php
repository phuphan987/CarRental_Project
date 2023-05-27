<?php 
    session_start();
    unset($_SESSION['user_role']);
    $_SESSION['loggedIn'] = false;
    header('location: index.php');
?>